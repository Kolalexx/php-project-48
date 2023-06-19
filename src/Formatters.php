<?php

namespace Differ\Formatters;

use function Differ\Formatter\Stylish\formatedDiffInStylish;
use function Differ\Formatter\Plain\formatedDiffInPlain;
use function Differ\Formatter\Json\formatedDiffInJson;

function formatedDiff($diff, $format = 'stylish')
{
    if ($format === 'stylish') {
        return formatedDiffInStylish($diff);
    } elseif ($format === 'plain') {
        return formatedDiffInPlain($diff);
    } elseif ($format === 'json') {
        return formatedDiffInJson($diff);
    }
}
