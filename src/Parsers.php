<?php

namespace Differ\Parsers;

use Symfony\Component\Yaml\Yaml;

function parseToArray(string $pathToFile)
{
    $str = file_get_contents($pathToFile);
    if (!$str) {
        return [];
    }
    if (pathinfo($pathToFile, PATHINFO_EXTENSION) === 'json') {
        $array = json_decode($str, true);
    } else {
        $array = Yaml::parse($str);
    }
    return $array;
}
