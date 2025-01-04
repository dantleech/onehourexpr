<?php

namespace DTL\OneHourExp\Tests;

use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class TokenizerTest extends TestCase
{
    #[DataProvider('provideTokenize')]
    public function testTokenize(string $expression, array $expectedTokens): void
    {
    }

    public static function provideTokenize(): Generator
    {
        yield [
            '1',
            [],
        ];
    }
}
