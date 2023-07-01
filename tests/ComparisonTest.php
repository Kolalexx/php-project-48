<?php

namespace Differ\Test;

use PHPUnit\Framework\TestCase;

use function Differ\Differ\genDiff;

class ComparisonTest extends TestCase
{
    /**
     * @dataProvider gendiffProvider
     */
    public function testGenDiff(string $file1, string $file2, string $format, string $fileResult)
    {
        $this->assertStringEqualsFile($fileResult, genDiff($file1, $file2, $format));
    }
    public function gendiffProvider()
    {
        return [
            'test json-stylish1' => [
                'tests/fixtures/file1.json',
                'tests/fixtures/file2.json',
                'stylish',
                'tests/fixtures/genDiffStylish1.json',
            ],
            'test json-stylish2' => [
                'tests/fixtures/file3.json',
                'tests/fixtures/file4.json',
                'stylish',
                'tests/fixtures/genDiffStylish2.json',
            ],
            'test json-plain' => [
                'tests/fixtures/file3.json',
                'tests/fixtures/file4.json',
                'plain',
                'tests/fixtures/genDiffPlain.json'
            ],
            'test json-json' => [
                'tests/fixtures/file3.json',
                'tests/fixtures/file4.json',
                'json',
                'tests/fixtures/genDiffJson.json',
            ],
            'test yaml-stylish1' => [
                'tests/fixtures/file1.yaml',
                'tests/fixtures/file2.yaml',
                'stylish',
                'tests/fixtures/genDiffStylish1.json',
            ],
            'test yaml-stylish2' => [
                'tests/fixtures/file3.yaml',
                'tests/fixtures/file4.yaml',
                'stylish',
                'tests/fixtures/genDiffStylish2.json',
            ],
            'test yaml-plain' => [
                'tests/fixtures/file3.yaml',
                'tests/fixtures/file4.yaml',
                'plain',
                'tests/fixtures/genDiffPlain.json',
            ],
            'test yaml-json' => [
                'tests/fixtures/file3.yaml',
                'tests/fixtures/file4.yaml',
                'json',
                'tests/fixtures/genDiffJson.json',
            ]
        ];
    }
}
