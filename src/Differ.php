<?php

namespace Differ\Differ;

use function Differ\Parsers\parseToArray;
use function Differ\Comparison\getDiff;
use function Differ\Formatters\formatedDiff;

function getAbsolutePath($path)
{
    $pathToFile = ($path[0] === '/' ? '' : __DIR__ . "/../") . $path;
    return $path;
}

function gendiff($path1, $path2, $format = 'stylish')
{
    $absolutePath1 = getAbsolutePath($path1);
    $absolutePath2 = getAbsolutePath($path2);
    $fileArray1 = parseToArray($absolutePath1);
    $fileArray2 = parseToArray($absolutePath2);
    $diff = getDiff($fileArray1, $fileArray2);
    print formatedDiff($diff, $format);
}