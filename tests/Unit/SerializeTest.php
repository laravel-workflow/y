<?php

declare(strict_types=1);

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Y\Y;

final class TestSerialize extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testSerialize($data): void
    {
        $unserialized = Y::unserialize(Y::serialize($data));
        $this->assertSame($data, $unserialized);
    }

    public function dataProvider(): array
    {
        return [
            'array []' => [[]],
            'array [[]]' => [[[]]],
            'array assoc' => [
                'key' => 'value',
            ],
            'int(PHP_INT_MIN)' => [PHP_INT_MIN],
            'int(-1)' => [-1],
            'int(0)' => [0],
            'int(1)' => [1],
            'int(PHP_INT_MAX)' => [PHP_INT_MAX],
            'float' => [1.123456789],
            'null' => [null],
            'string empty' => [''],
            'string foo' => ['foo'],
            'string bytes' => [random_bytes(4096)],
            'true' => [true],
            'false' => [false],
        ];
    }
}
