<?php

namespace Differ\Formatter\Json;

function formatedDiffInJson(array $diff): string
{
    $json = json_encode($diff, JSON_PRETTY_PRINT);
    return $json;
}
