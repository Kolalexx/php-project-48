<?php

namespace Differ\Cli;

use Docopt;

use function Differ\Comparison\gendiff;

function run()
{
    $doc = <<<DOC
    gendiff -h

    Generate diff

    Usage:
        gendiff (-h|--help)
        gendiff (-v|--version)
        gendiff [--format <fmt>] <firstFile> <secondFile>

    Options:
        -h --help                     Show this screen
        -v --version                  Show version
        --format <fmt>                Report format [default: stylish]
    DOC;

    $args = Docopt::handle($doc, array('version' => '1.0'));

    $arg1 = $args['<firstFile>'];
    $pathToFile1 = ($arg1[0] === '/' ? '' : __DIR__ . "/../") . $arg1;

    $arg2 = $args['<secondFile>'];
    $pathToFile2 = ($arg2[0] === '/' ? '' : __DIR__ . "/../") . $arg2;

    $format = $args['--format'];

    gendiff($pathToFile1, $pathToFile2, $format);
}
