<?php

namespace Differ\Formatter\Json;

function formatDiffInJson(array $diff): string
{
    $json = json_encode($diff, JSON_PRETTY_PRINT);
    return $json;
}
