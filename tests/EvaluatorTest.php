<?php

namespace DTL\OneHourExp\Tests;

use DTL\OneHourExp\Evaluator;
use DTL\OneHourExp\Parser;
use DTL\OneHourExp\Tokenizer;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class EvaluatorTest extends TestCase
{
    #[DataProvider('provideEvaluate')]
    public function testEvaluate(string $expression, mixed $expectedValue): void
    {
        $tokenizer = new Tokenizer();
        $tokens = $tokenizer->tokenize($expression);
        $ast = (new Parser())->parse($tokens);

        $evaluator = new Evaluator();
        $result = $evaluator->evaluate($ast);

        self::assertSame($expectedValue, $result);
    }

    public static function provideEvaluate(): Generator
    {
        yield 'one' => ['1', 1];
        yield 'six' => ['1 + 2 + 3', 6];
    }
}
