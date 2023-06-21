<?php

namespace Differ\Comparison;

use function Functional\sort;

function makeLeaf(string $key, string $type, mixed $value1, mixed $value2 = null): array
{
    return ['key' => $key, 'type' => $type, 'value1' => $value1, 'value2' => $value2];
}

function makeNode(string $key, string $type, array $children): array
{
    return ['key' => $key, 'type' => $type, 'children' => $children];
}

function getKey(array $diff)
{
    return $diff['key'];
}

function getType(array $diff)
{
    return $diff['type'];
}

function getChildren(array $diff)
{
    return $diff['children'];
}

function getValue1(array $diff)
{
    return $diff['value1'];
}

function getValue2(array $diff)
{
    return $diff['value2'];
}

function makeTree(mixed $array1, mixed $array2): array
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

function getDiff(mixed $array1, mixed $array2): array
{
    $children = makeTree($array1, $array2);
    return ['type' => 'tree', 'children' => $children];
}
