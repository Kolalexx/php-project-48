<?php

namespace Differ\Formatter\Plain;

use function Differ\Comparison\getChildren;
use function Differ\Comparison\getKey;
use function Differ\Comparison\getType;
use function Differ\Comparison\getValue1;
use function Differ\Comparison\getValue2;

function toString(mixed $item): string
{
    if (is_array($item)) {
        return "[complex value]";
    }
    if (is_null($item)) {
        return "null";
    }
    return var_export($item, true);
}

function makeFormated(array $currentValue, string $curretPath, array $acc): array
{
    $type = getType($currentValue);
    if ($type === 'tree') {
        $children = getChildren($currentValue);
        return array_reduce($children, fn($newAcc, $child) => makeFormated($child, '', $newAcc), $acc);
    }
    $key = getKey($currentValue);
    $path = $curretPath . $key;
    if ($type === 'node') {
        $children = getChildren($currentValue);
        $newPath = "{$path}.";
        return array_reduce($children, fn($newAcc, $child) => makeFormated($child, $newPath, $newAcc), $acc);
    }
    $value1 = toString(getValue1($currentValue));
    $value2 = toString(getValue2($currentValue));
    if ($type === 'added') {
        return array_merge($acc, ["Property '$path' was added with value: {$value1}"]);
    }
    if ($type === 'deleted') {
        return array_merge($acc, ["Property '$path' was removed"]);
    }
    if ($type === 'changed') {
        return array_merge($acc, ["Property '$path' was updated. From {$value1} to {$value2}"]);
    }
    return $acc;
}

function formatDiffInPlain(array $diff): string
{
    $lines = makeFormated($diff, '', []);
    return implode("\n", $lines);
}
