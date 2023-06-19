<?php

namespace Differ\Test;

use PHPUnit\Framework\TestCase;
use function Differ\Differ\gendiff;

class ComparisonTest extends TestCase
{
    public function testGendiffJson1(): void
    {
        $file1 = 'tests/fixtures/file1.json';
        $file2 = 'tests/fixtures/file2.json';

        $result1 = file_get_contents('tests/fixtures/genDiffStylish1.json', true);
        $this->expectOutputString($result1);
        gendiff($file1, $file2, 'stylish');
    }

    public function testGendiffJson2(): void
    {
        $file1 = 'tests/fixtures/file1.json';
        $file3 = 'tests/fixtures/file3.json';

        $result2 = file_get_contents('tests/fixtures/genDiffStylish2.json', true);
        $this->expectOutputString($result2);
        gendiff($file1, $file3, 'stylish');
    }

    public function testGendiffJson3(): void
    {
        $file4 = 'tests/fixtures/file4.json';
        $file5 = 'tests/fixtures/file5.json';

        $result3 = file_get_contents('tests/fixtures/genDiffStylish3.json', true);
        $this->expectOutputString($result3);
        gendiff($file4, $file5, 'stylish');
    }

    public function testGendiffJson4(): void
    {
        $file4 = 'tests/fixtures/file4.json';
        $file5 = 'tests/fixtures/file5.json';

        $result4 = file_get_contents('tests/fixtures/genDiffPlain.json', true);
        $this->expectOutputString($result4);
        gendiff($file4, $file5, 'plain');
    }

    public function testGendiffJson5(): void
    {
        $file4 = 'tests/fixtures/file4.json';
        $file5 = 'tests/fixtures/file5.json';

        $result5 = file_get_contents('tests/fixtures/genDiffJson.json', true);
        $this->expectOutputString($result5);
        gendiff($file4, $file5, 'json');
    }

    public function testGendiffYaml1(): void
    {
        $file1 = 'tests/fixtures/file1.yaml';
        $file2 = 'tests/fixtures/file2.yaml';

        $result1 = file_get_contents('tests/fixtures/genDiffStylish1.json', true);
        $this->expectOutputString($result1);
        gendiff($file1, $file2, 'stylish');
    }

    public function testGendiffYaml2(): void
    {
        $file1 = 'tests/fixtures/file1.yaml';
        $file3 = 'tests/fixtures/file3.yaml';

        $result2 = file_get_contents('tests/fixtures/genDiffStylish2.json', true);
        $this->expectOutputString($result2);
        gendiff($file1, $file3, 'stylish');
    }

    public function testGendiffYaml3(): void
    {
        $file4 = 'tests/fixtures/file4.yaml';
        $file5 = 'tests/fixtures/file5.yaml';

        $result3 = file_get_contents('tests/fixtures/genDiffStylish3.json', true);
        $this->expectOutputString($result3);
        gendiff($file4, $file5, 'stylish');
    }

    public function testGendiffYaml4(): void
    {
        $file4 = 'tests/fixtures/file4.yaml';
        $file5 = 'tests/fixtures/file5.yaml';

        $result4 = file_get_contents('tests/fixtures/genDiffPlain.json', true);
        $this->expectOutputString($result4);
        gendiff($file4, $file5, 'plain');
    }

    public function testGendiffYaml5(): void
    {
        $file4 = 'tests/fixtures/file4.yaml';
        $file5 = 'tests/fixtures/file5.yaml';

        $result5 = file_get_contents('tests/fixtures/genDiffJson.json', true);
        $this->expectOutputString($result5);
        gendiff($file4, $file5, 'json');
    }
}
