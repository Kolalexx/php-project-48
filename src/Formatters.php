<?php

namespace Differ\Formatters;

use function Differ\Formatter\Stylish\formatDiffInStylish;
use function Differ\Formatter\Plain\formatDiffInPlain;
use function Differ\Formatter\Json\formatDiffInJson;

function formatDiff(array $diff, string $format)
{
    switch ($format) {
        case 'stylish':
            return formatDiffInStylish($diff);
        case 'plain':
            return formatDiffInPlain($diff);
        case 'json':
            return formatDiffInJson($diff);
    }
}
