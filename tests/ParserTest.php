<?php

namespace DTL\OneHourExp\Tests;

use DTL\OneHourExp\Node;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class ParserTest extends TestCase
{
    #[DataProvider('provideParse')]
    public function testParse(string $expression, Node $expectedNode): void
    {
    }

    public static function provideParse(): Generator
    {
    }
}
