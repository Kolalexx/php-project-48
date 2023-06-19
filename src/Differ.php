<?php

namespace Differ\Differ;

use function Differ\Parsers\parseToArray;
use function Differ\Comparison\getDiff;
use function Differ\Formatters\formatedDiff;

function gendiff($pathToFile1, $pathToFile2, $format = 'stylish')
{
    $fileArray1 = parseToArray($pathToFile1);
    $fileArray2 = parseToArray($pathToFile2);
    $diff = getDiff($fileArray1, $fileArray2);
    print formatedDiff($diff, $format);
}
