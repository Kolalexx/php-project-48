<?php

namespace Differ\Differ;

use function Differ\Parsers\parseToArray;
use function Differ\Comparison\getDiff;
use function Differ\Formatters\formatedDiff;

function getAbsolutePath(string $path)
{
    $pathToFile = ($path[0] === '/' ? '' : __DIR__ . "/../") . $path;
    $realPath = realpath($pathToFile);
    if ($realPath === false) {
        throw new Exception("Invalid path to file: '{$path}'");
    }
    return $realPath;
}

function gendiff(string $path1, string $path2, string $format = 'stylish')
{
    $absolutePath1 = getAbsolutePath($path1);
    $absolutePath2 = getAbsolutePath($path2);
    $fileArray1 = parseToArray($absolutePath1);
    $fileArray2 = parseToArray($absolutePath2);
    $diff = getDiff($fileArray1, $fileArray2);
    return formatedDiff($diff, $format);
}
