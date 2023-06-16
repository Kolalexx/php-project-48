<?php

namespace Differ\Test;

use PHPUnit\Framework\TestCase;
use function Differ\Comparison\gendiff;

class ComparisonTest extends TestCase
{
    public function testGendiffJson1(): void
    {
        $file3 = 'tests/fixtures/file3.json';
        $file2 = 'tests/fixtures/file2.json';

        $result1 = file_get_contents('tests/fixtures/gendiffJson1.json', true);
        $this->expectOutputString($result1);
        gendiff($file3, $file2, 'stylish');
    }

    public function testGendiffJson2(): void
    {
        $file3 = 'tests/fixtures/file3.json';
        $file4 = 'tests/fixtures/file4.json';

        $result2 = file_get_contents('tests/fixtures/gendiffJson2.json', true);
        $this->expectOutputString($result2);
        gendiff($file3, $file4, 'stylish');
    }

    public function testGendiffJson3(): void
    {
        $file1 = 'tests/fixtures/file1.json';
        $file5 = 'tests/fixtures/file5.json';

        $result3 = file_get_contents('tests/fixtures/gendiffJson3.json', true);
        $this->expectOutputString($result3);
        gendiff($file1, $file5, 'stylish');
    }

    public function testGendiffJson4(): void
    {
        $file6 = 'tests/fixtures/file6.json';
        $file7 = 'tests/fixtures/file7.json';

        $result4 = file_get_contents('tests/fixtures/gendiffJson4.json', true);
        $this->expectOutputString($result4);
        gendiff($file6, $file7, 'stylish');
    }

    public function testGendiffJson5(): void
    {
        $file6 = 'tests/fixtures/file6.json';
        $file7 = 'tests/fixtures/file7.json';

        $result5 = file_get_contents('tests/fixtures/gendiffPlain.json', true);
        $this->expectOutputString($result5);
        gendiff($file6, $file7, 'plain');
    }

    public function testGendiffYaml1(): void
    {
        $file3 = 'tests/fixtures/file3.yaml';
        $file2 = 'tests/fixtures/file2.yaml';

        $result1 = file_get_contents('tests/fixtures/gendiffJson1.json', true);
        $this->expectOutputString($result1);
        gendiff($file3, $file2, 'stylish');
    }

    public function testGendiffYaml2(): void
    {
        $file3 = 'tests/fixtures/file3.yaml';
        $file4 = 'tests/fixtures/file4.yaml';

        $result2 = file_get_contents('tests/fixtures/gendiffJson2.json', true);
        $this->expectOutputString($result2);
        gendiff($file3, $file4, 'stylish');
    }

    public function testGendiffYaml3(): void
    {
        $file1 = 'tests/fixtures/file1.yaml';
        $file5 = 'tests/fixtures/file5.yaml';

        $result3 = file_get_contents('tests/fixtures/gendiffJson3.json', true);
        $this->expectOutputString($result3);
        gendiff($file1, $file5, 'stylish');
    }

    public function testGendiffYaml4(): void
    {
        $file6 = 'tests/fixtures/file6.yaml';
        $file7 = 'tests/fixtures/file7.yaml';

        $result4 = file_get_contents('tests/fixtures/gendiffJson4.json', true);
        $this->expectOutputString($result4);
        gendiff($file6, $file7, 'stylish');
    }

    public function testGendiffYaml5(): void
    {
        $file6 = 'tests/fixtures/file6.yaml';
        $file7 = 'tests/fixtures/file7.yaml';

        $result5 = file_get_contents('tests/fixtures/gendiffPlain.json', true);
        $this->expectOutputString($result5);
        gendiff($file6, $file7, 'plain');
    }
}
