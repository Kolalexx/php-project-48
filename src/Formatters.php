<?php

namespace Differ\Formatters;

use function Differ\Formats\Stylish\formatedDiffInStylish;

function formatedDiff($diff, $format = 'stylish')
{
    if ($format === 'stylish') {
        return formatedDiffInStylish($diff);
    }
}
