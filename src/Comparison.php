<?php

namespace Differ\Comparison;

function readFileIntoString($pathToFile)
{
    return file_get_contents($pathToFile);
}

function makeStringFromValue($value)
{
    if (is_bool($value)) {
        return ($value === false) ? "false" : "true"; 
    } else {
        return $value;
    }
}

function decodStringIntoArray($stringJson)
{
    $arrayJson = json_decode($stringJson, true);
    return array_reduce(array_keys($arrayJson), function ($acc, $key) use ($arrayJson) {
        $value = $arrayJson[$key];
        $stringValue = makeStringFromValue($value);
        return [...$acc, ...[$key => $stringValue]];
    }, []);
}

function gendiff($pathToFile1, $pathToFile2, $format)
{
    $fileString1 = readFileIntoString($pathToFile1);
    $fileString2 = readFileIntoString($pathToFile2);
    $fileArray1 = decodStringIntoArray($fileString1);
    $fileArray2 = decodStringIntoArray($fileString2);
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