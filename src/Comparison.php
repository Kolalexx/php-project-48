<?php

namespace Differ\Comparison;

use function Differ\Parsers\parseToArray;
use function Differ\Formatters\formatedDiff;
use function Functional\sort;

function makeLeaf($key, $type, $value1, $value2 = null): array
{
    return ['key' => $key, 'type' => $type, 'value1' => $value1, 'value2' => $value2];
}

function makeNode($key, $type, $children): array
{
    return ['key' => $key, 'type' => $type, 'children' => $children];
}

function getKey($diff)
{
    return $diff['key'];
}

function getType($diff)
{
    return $diff['type'];
}

function getChildren($diff)
{
    return $diff['children'];
}

function getValue1($diff)
{
    return $diff['value1'];
}

function getValue2($diff)
{
    return $diff['value2'];
}

function makeTree(array $array1, array $array2): array
{
    $keys1 = array_keys($array1);
    $keys2 = array_keys($array2);
    $keys = array_unique(array_merge($keys1, $keys2));
    $sortedKeys = sort($keys, fn ($left, $right) => strcmp($left, $right));
    return array_map(function ($key) use ($array1, $array2) {
        $value1 = $array1[$key] ?? null;
        $value2 = $array2[$key] ?? null;
        if (!array_key_exists($key, $array1)) {
            return makeLeaf($key, 'added', $value2);
        } elseif (!array_key_exists($key, $array2)) {
            return makeLeaf($key, 'deleted', $value1);
        } elseif ($value1 === $value2) {
            return makeLeaf($key, 'unchanged', $value1);
        } elseif (!is_array($value1) || !is_array($value2)) {
            return makeLeaf($key, 'changed', $value1, $value2);
        } else {
            $result = makeTree($value1, $value2);
            return makeNode($key, 'node', $result);
        }
    }, $sortedKeys);
}

function getDiff(array $array1, array $array2): array
{
    $children = makeTree($array1, $array2);
    return ['type' => 'tree', 'children' => $children];
}

function gendiff($pathToFile1, $pathToFile2, $format)
{
    $fileArray1 = parseToArray($pathToFile1);
    $fileArray2 = parseToArray($pathToFile2);
    $diff = getDiff($fileArray1, $fileArray2);
    print formatedDiff($diff);
}
