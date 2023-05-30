<?php

namespace Differ\Comparison;

use function Differ\Parsers\parseToArray;

function gendiff($pathToFile1, $pathToFile2, $format)
{
    $fileArray1 = parseToArray($pathToFile1);
    $fileArray2 = parseToArray($pathToFile2);
    $keys = array_unique(array_merge(array_keys($fileArray1), array_keys($fileArray2)));
    asort($keys);
    $result = [];
    foreach ($keys as $key) {
        if (!array_key_exists($key, $fileArray1)) {
            $result[] = "  + " . $key . ": " . $fileArray2[$key];
        } elseif (!array_key_exists($key, $fileArray2)) {
            $result[] = "  - " . $key . ": " . $fileArray1[$key];
        } elseif ($fileArray1[$key] !== $fileArray2[$key]) {
            $result[] = "  - " . $key . ": " . $fileArray1[$key];
            $result[] = "  + " . $key . ": " . $fileArray2[$key];
        } else {
            $result[] = "    " . $key . ": " . $fileArray1[$key];
        }
    }
    print_r("{\n" . implode("\n", $result) . "\n}\n");
}
