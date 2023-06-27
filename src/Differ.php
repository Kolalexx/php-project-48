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

function readFile(string $pathToFile)
{
    $str = file_get_contents($pathToFile);
    if ($str === '') {
        return [];
    }
    if ($str === false) {
        throw new \Exception("Cannot parse the file");
    }
    return $str;
}

function getContentAndParse(string $pathToFile)
{
    $absolutePath = getAbsolutePath($pathToFile);
    $fileToString = readFile($absolutePath);
    $extension = pathinfo($absolutePath, PATHINFO_EXTENSION);
    $fileToArray = parseToArray($fileToString, $extension);
    return $fileToArray;
}

function genDiff(string $path1, string $path2, string $format = 'stylish')
{
    $fileArray1 = getContentAndParse($path1);
    $fileArray2 = getContentAndParse($path2);
    $diff = getDiff($fileArray1, $fileArray2);
    return formatDiff($diff, $format);
}
