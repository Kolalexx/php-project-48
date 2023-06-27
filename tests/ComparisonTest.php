<?php

namespace Differ\Test;

use PHPUnit\Framework\TestCase;

use function Differ\Differ\genDiff;

class ComparisonTest extends TestCase
{
    public function testGendiffJson1(): void
    {
        $file1 = 'tests/fixtures/file1.json';
        $file2 = 'tests/fixtures/file2.json';
        $result1 = 'tests/fixtures/genDiffStylish1.json';
        $this->assertStringEqualsFile($result1, genDiff($file1, $file2, 'stylish'));
    }

    public function testGendiffJson2(): void
    {
        $file1 = 'tests/fixtures/file1.json';
        $file3 = 'tests/fixtures/file3.json';
        $result2 = 'tests/fixtures/genDiffStylish2.json';
        $this->assertStringEqualsFile($result2, genDiff($file1, $file3, 'stylish'));
    }

    public function testGendiffJson3(): void
    {
        $file4 = 'tests/fixtures/file4.json';
        $file5 = 'tests/fixtures/file5.json';
        $result3 = 'tests/fixtures/genDiffStylish3.json';
        $this->assertStringEqualsFile($result3, genDiff($file4, $file5, 'stylish'));
    }

    public function testGendiffJson4(): void
    {
        $file4 = 'tests/fixtures/file4.json';
        $file5 = 'tests/fixtures/file5.json';
        $result4 = 'tests/fixtures/genDiffPlain.json';
        $this->assertStringEqualsFile($result4, genDiff($file4, $file5, 'plain'));
    }

    public function testGendiffJson5(): void
    {
        $file4 = 'tests/fixtures/file4.json';
        $file5 = 'tests/fixtures/file5.json';
        $result5 = 'tests/fixtures/genDiffJson.json';
        $this->assertStringEqualsFile($result5, genDiff($file4, $file5, 'json'));
    }

    public function testGendiffYaml1(): void
    {
        $file1 = 'tests/fixtures/file1.yaml';
        $file2 = 'tests/fixtures/file2.yaml';
        $result1 = 'tests/fixtures/genDiffStylish1.json';
        $this->assertStringEqualsFile($result1, genDiff($file1, $file2, 'stylish'));
    }

    public function testGendiffYaml2(): void
    {
        $file1 = 'tests/fixtures/file1.yaml';
        $file3 = 'tests/fixtures/file3.yaml';
        $result2 = 'tests/fixtures/genDiffStylish2.json';
        $this->assertStringEqualsFile($result2, genDiff($file1, $file3, 'stylish'));
    }

    public function testGendiffYaml3(): void
    {
        $file4 = 'tests/fixtures/file4.yaml';
        $file5 = 'tests/fixtures/file5.yaml';
        $result3 = 'tests/fixtures/genDiffStylish3.json';
        $this->assertStringEqualsFile($result3, genDiff($file4, $file5, 'stylish'));
    }

    public function testGendiffYaml4(): void
    {
        $file4 = 'tests/fixtures/file4.yaml';
        $file5 = 'tests/fixtures/file5.yaml';
        $result4 = 'tests/fixtures/genDiffPlain.json';
        $this->assertStringEqualsFile($result4, genDiff($file4, $file5, 'plain'));
    }

    public function testGendiffYaml5(): void
    {
        $file4 = 'tests/fixtures/file4.yaml';
        $file5 = 'tests/fixtures/file5.yaml';
        $result5 = 'tests/fixtures/genDiffJson.json';
        $this->assertStringEqualsFile($result5, genDiff($file4, $file5, 'json'));
    }
}
