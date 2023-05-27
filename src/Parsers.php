<?php

namespace Differ\Parsers;

use Symfony\Component\Yaml\Yaml;

function makeStringFromValue($value)
{
    if (is_bool($value)) {
        return ($value === false) ? "false" : "true";
    } else {
        return $value;
    }
}

function parseToArray(string $pathToFile)
{
    $str = file_get_contents($pathToFile);
    if (empty($str)) {
        return [];
    }
    if (pathinfo($pathToFile, PATHINFO_EXTENSION) === 'json') {
        $array = json_decode($str, true);
    } else {
        $array = Yaml::parse($str);
    }
    return array_reduce(array_keys($array), function ($acc, $key) use ($array) {
        $value = $array[$key];
        $stringValue = makeStringFromValue($value);
        return [...$acc, ...[$key => $stringValue]];
    }, []);
}
