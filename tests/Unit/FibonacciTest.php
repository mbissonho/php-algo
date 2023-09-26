<?php

namespace Mbissonho\PhpAlgo\Tests\Unit;

use Mbissonho\PhpAlgo\Fibonacci;
use PHPUnit\Framework\TestCase;

class FibonacciTest extends TestCase
{
    public function testLastNumberShouldBeProvidedAsParameter()
    {
        $this->expectException(\InvalidArgumentException::class);

        (new Fibonacci())->execute([]);
    }

    public function testValidLastNumberShouldBeProvidedAsParameter()
    {
        $this->expectException(\InvalidArgumentException::class);

        (new Fibonacci())->execute(['last_number' => 'non integer value']);
        (new Fibonacci())->execute(['last_number' => '13']);
    }

    public function testFibonacciSequence()
    {
        $this->assertEquals(
            [1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89],
            (new Fibonacci())->execute(['last_number' => 89]),
            'Fibonacci sequence wasn\'t generated correctly'
        );
    }

}