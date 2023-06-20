<?php

namespace Differ\Cli;

use Docopt;

use function Differ\Differ\gendiff;

const DOC = <<<EOF
gendiff -h

Usage: gendiff [options] <firstFile> <secondFile>

Compares two configuration files and shows a difference.

Options:
    -h, --help                     display help for command
    -v, --version                  output the version number
    -f, --format [type]            output format [default: "stylish"]
EOF;

function run()
{
    $args = Docopt::handle(DOC);
    $arg1 = $args['<firstFile>'];
    $arg2 = $args['<secondFile>'];
    $format = $args['--format'];

    return gendiff($arg1, $arg2, $format);
}
