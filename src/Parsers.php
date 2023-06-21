<?php

namespace Differ\Parsers;

use Symfony\Component\Yaml\Yaml;

function parseToArray(string $pathToFile)
{
    $str = file_get_contents($pathToFile);
    if ($str === '') {
        return [];
    }
    if (pathinfo($pathToFile, PATHINFO_EXTENSION) === 'json') {
        $array = json_decode($str, true);
    } elseif (pathinfo($pathToFile, PATHINFO_EXTENSION) === 'yaml') {
        $array = Yaml::parse($str);
    } elseif (pathinfo($pathToFile, PATHINFO_EXTENSION) === 'yml') {
        $array = Yaml::parse($str);
    } else {
        throw new \Exception("Unknown extension");
    }
    return $array;
}
