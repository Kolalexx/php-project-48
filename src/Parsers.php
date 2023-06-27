<?php

namespace Differ\Parsers;

use Symfony\Component\Yaml\Yaml;

function parseToArray(string $fileToString, string $extension)
{
    switch ($extension) {
        case 'json':
            $array = json_decode($fileToString, true);
        case 'yaml':
            $array = Yaml::parse($fileToString);
        case 'yml':
            $array = Yaml::parse($fileToString);
        default:
            throw new \Exception("Unknown extension: '{$extension}'");
    }
    return $array;
}
