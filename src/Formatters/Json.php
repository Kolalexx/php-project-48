<?php

namespace Differ\Formatter\Json;

function formatDiffInJson(array $diff): string
{
    return json_encode($diff, JSON_PRETTY_PRINT);
}
