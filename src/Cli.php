<?php

namespace Differ\Cli;

use Docopt;

function run()
{
    $doc = <<<DOC
    gendiff -h

    Generate diff

    Usage:
        gendiff (-h|--help)
        gendiff (-v|--version)

    Options:
        -h --help                     Show this screen
        -v --version                  Show version
    DOC;
    
    $args = Docopt::handle($doc, array('version'=>'1.0'));
}
