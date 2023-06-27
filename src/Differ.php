<?php

namespace Differ\Differ;

use function Differ\Parsers\parseToArray;
use function Differ\Comparison\getDiff;
use function Differ\Formatters\formatDiff;

function getAbsolutePath(string $path)
{
    $realPath = realpath($path);
    if ($realPath === false) {
        throw new \Exception("Invalid path to file: '{$path}'");
    }
    return $realPath;
}

function genDiff(string $path1, string $path2, string $format = 'stylish')
{
    $absolutePath1 = getAbsolutePath($path1);
    $absolutePath2 = getAbsolutePath($path2);
    $fileArray1 = parseToArray($absolutePath1);
    $fileArray2 = parseToArray($absolutePath2);
    $diff = getDiff($fileArray1, $fileArray2);
    return formatDiff($diff, $format);
}
