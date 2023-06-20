<?php

namespace Differ\Cli;

use Docopt;

use function Differ\Differ\gendiff;

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
    $arg2 = $args['<secondFile>'];
    $format = $args['--format'];

    gendiff($arg1, $arg2, $format);
}
