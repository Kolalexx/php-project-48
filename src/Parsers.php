<?php

namespace Differ\Parsers;

use Symfony\Component\Yaml\Yaml;

function parseToArray(string $fileToString, string $extension)
{
    switch ($extension) {
        case 'json':
            return $array = json_decode($fileToString, true);
        case 'yaml':
            return $array = Yaml::parse($fileToString);
        case 'yml':
            return $array = Yaml::parse($fileToString);
        default:
            throw new \Exception("Unknown extension: '{$extension}'");
    }
}
