<?php

namespace DTL\OneHourExp\Tests;

use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class EvaluatorTest extends TestCase
{
    #[DataProvider('provideEvaluate')]
    public function testEvaluate(string $expression, mixed $expectedValue): void
    {
    }

    public static function provideEvaluate(): Generator
    {
    }
}
