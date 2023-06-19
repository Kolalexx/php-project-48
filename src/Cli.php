<?php

namespace Differ\Cli;

use Docopt;

use function Differ\Comparison\gendiff;

function run()
{
    $doc = <<<DOC
    gendiff -h

    Usage: gendiff [options] <firstFile> <secondFile>

    Compares two configuration files and shows a difference.

    Options:
        -h, --help                     display help for command
        -v, --version                  output the version number
        -f, --format [type]            output format [default: "stylish"]
    DOC;

    $args = Docopt::handle($doc, array('version' => '1.0'));

    $arg1 = $args['<firstFile>'];
    $pathToFile1 = ($arg1[0] === '/' ? '' : __DIR__ . "/../") . $arg1;

    $arg2 = $args['<secondFile>'];
    $pathToFile2 = ($arg2[0] === '/' ? '' : __DIR__ . "/../") . $arg2;

    $format = $args['--format'];

    gendiff($pathToFile1, $pathToFile2, $format);
}
