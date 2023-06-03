<?php

namespace Differ\Test;

use PHPUnit\Framework\TestCase;
use function Differ\Comparison\gendiff;

class ComparisonTest extends TestCase
{
    public function testGendiffJson1(): void
    {
        $file1 = 'tests/fixtures/file1.json';
        $file2 = 'tests/fixtures/file2.json';

        $result = file_get_contents('tests/fixtures/gendiffFlat.json', true);
        $this->expectOutputString($result);
        gendiff($file1, $file2, 'stylish');
    }

    public function testGendiffJson2(): void
    {
        $file3 = 'tests/fixtures/file3.json';
        $file2 = 'tests/fixtures/file2.json';

        $result2 = file_get_contents('tests/fixtures/result2.json', true);
        $this->expectOutputString($result2);
        gendiff($file3, $file2, 'stylish');
    }

    public function testGendiffJson3(): void
    {
        $file3 = 'tests/fixtures/file3.json';
        $file4 = 'tests/fixtures/file4.json';

        $result3 = file_get_contents('tests/fixtures/result3.json', true);
        $this->expectOutputString($result3);
        gendiff($file3, $file4, 'stylish');
    }

    public function testGendiffJson4(): void
    {
        $file1 = 'tests/fixtures/file1.json';
        $file5 = 'tests/fixtures/file5.json';

        $result4 = file_get_contents('tests/fixtures/result4.json', true);
        $this->expectOutputString($result4);
        gendiff($file1, $file5, 'stylish');
    }

    public function testGendiffJson5(): void
    {
        $file1 = 'tests/fixtures/file1.json';
        $file6 = 'tests/fixtures/file6.json';

        $result5 = file_get_contents('tests/fixtures/result5.json', true);
        $this->expectOutputString($result5);
        gendiff($file1, $file6, 'stylish');
    }

    public function testGendiffJson6(): void
    {
        $file7 = 'tests/fixtures/file7.json';
        $file8 = 'tests/fixtures/file8.json';

        $result6 = file_get_contents('tests/fixtures/result6.json', true);
        $this->expectOutputString($result6);
        gendiff($file7, $file8, 'stylish');
    }

    public function testGendiffYaml1(): void
    {
        $file1 = 'tests/fixtures/file1.yaml';
        $file2 = 'tests/fixtures/file2.yaml';

        $result = file_get_contents('tests/fixtures/gendiffFlat.json', true);
        $this->expectOutputString($result);
        gendiff($file1, $file2, 'stylish');
    }

    public function testGendiffYaml2(): void
    {
        $file3 = 'tests/fixtures/file3.yaml';
        $file2 = 'tests/fixtures/file2.yaml';

        $result2 = file_get_contents('tests/fixtures/result2.json', true);
        $this->expectOutputString($result2);
        gendiff($file3, $file2, 'stylish');
    }

    public function testGendiffYaml3(): void
    {
        $file3 = 'tests/fixtures/file3.yaml';
        $file4 = 'tests/fixtures/file4.yaml';

        $result3 = file_get_contents('tests/fixtures/result3.json', true);
        $this->expectOutputString($result3);
        gendiff($file3, $file4, 'stylish');
    }

    public function testGendiffYaml4(): void
    {
        $file1 = 'tests/fixtures/file1.yaml';
        $file5 = 'tests/fixtures/file5.yaml';

        $result4 = file_get_contents('tests/fixtures/result4.json', true);
        $this->expectOutputString($result4);
        gendiff($file1, $file5, 'stylish');
    }

    public function testGendiffYaml5(): void
    {
        $file1 = 'tests/fixtures/file1.yaml';
        $file6 = 'tests/fixtures/file6.yaml';

        $result5 = file_get_contents('tests/fixtures/result5.json', true);
        $this->expectOutputString($result5);
        gendiff($file1, $file6, 'stylish');
    }

    public function testGendiffYaml6(): void
    {
        $file7 = 'tests/fixtures/file7.yaml';
        $file8 = 'tests/fixtures/file8.yaml';

        $result6 = file_get_contents('tests/fixtures/result6.json', true);
        $this->expectOutputString($result6);
        gendiff($file7, $file8, 'stylish');
    }
}
