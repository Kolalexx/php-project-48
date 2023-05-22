<?php

namespace Differ\Test;

use PHPUnit\Framework\TestCase;
use function Differ\Comparison\gendiff;

class ComparisonTest extends TestCase
{
    public function testGendiff1(): void
    {
        $file1 = 'tests/fixtures/file1.json';
        $file2 = 'tests/fixtures/file2.json';

        $result = file_get_contents('tests/fixtures/gendiffFlat.json', true);
        $this->expectOutputString($result);
        gendiff($file1, $file2, 'stylish');
    }

    public function testGendiff2(): void
    {
        $file3 = 'tests/fixtures/file3.json';
        $file2 = 'tests/fixtures/file2.json';

        $result2 = file_get_contents('tests/fixtures/result2.json', true);
        $this->expectOutputString($result2);
        gendiff($file3, $file2, 'stylish');
    }

    public function testGendiff3(): void
    {
        $file3 = 'tests/fixtures/file3.json';
        $file4 = 'tests/fixtures/file4.json';

        $result3 = file_get_contents('tests/fixtures/result3.json', true);
        $this->expectOutputString($result3);
        gendiff($file3, $file4, 'stylish');
    }

    public function testGendiff4(): void
    {
        $file1 = 'tests/fixtures/file1.json';
        $file5 = 'tests/fixtures/file5.json';

        $result4 = file_get_contents('tests/fixtures/result4.json', true);
        $this->expectOutputString($result4);
        gendiff($file1, $file5, 'stylish');
    }

    public function testGendiff5(): void
    {
        $file1 = 'tests/fixtures/file1.json';
        $file6 = 'tests/fixtures/file6.json';

        $result5 = file_get_contents('tests/fixtures/result5.json', true);
        $this->expectOutputString($result5);
        gendiff($file1, $file6, 'stylish');
    }
}
