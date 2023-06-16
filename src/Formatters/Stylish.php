<?php

namespace Differ\Formatter\Stylish;

use function Differ\Comparison\getChildren;
use function Differ\Comparison\getKey;
use function Differ\Comparison\getType;
use function Differ\Comparison\getValue1;
use function Differ\Comparison\getValue2;

function toString($item, $depth): string
{
    if (!is_array($item)) {
        return is_null($item) ? "null" : trim(var_export($item, true), "'");
    }
    $curretIndent = getIndent($depth);
    $lines = array_map(function ($key, $value) use ($curretIndent, $depth) {
        $valueInString = toString($value, $depth + 1);
        return "{$curretIndent}    {$key}: {$valueInString}";
    }, array_keys($item), $item);
    return convertedToString($lines, $curretIndent);
}

function convertedToString($lines, $curretIndent)
{
    return "{\n" . implode("\n", $lines) . "\n" . $curretIndent . "}";
}

function getIndent($depth): string
{
    return str_repeat('    ', $depth - 1);
}

function makeFormated($currentValue, $depth): string
{
    $curretIndent = getIndent($depth);
    $lines = array_reduce($currentValue, function ($acc, $item) use ($curretIndent, $depth) {
        $key = getKey($item);
        $type  = getType($item);
        if ($type === 'node') {
            $children = makeFormated(getChildren($item), $depth + 1);
            return [...$acc, "{$curretIndent}    {$key}: {$children}"];
        }
        $value1 = toString(getValue1($item), $depth + 1);
        $value2 = toString(getValue2($item), $depth + 1);
        if ($type === 'added') {
            return [...$acc, "{$curretIndent}  + {$key}: {$value1}"];
        } elseif ($type === 'deleted') {
            return [...$acc, "{$curretIndent}  - {$key}: {$value1}"];
        } elseif ($type === 'changed') {
            return [...$acc, "{$curretIndent}  - {$key}: {$value1}", "{$curretIndent}  + {$key}: {$value2}"];
        } else {
            return [...$acc, "{$curretIndent}    {$key}: {$value1}"];
        }
    }, []);
    return convertedToString($lines, $curretIndent);
}

function formatedDiffInStylish($diff)
{
    return makeFormated(getChildren($diff), 1);
}
