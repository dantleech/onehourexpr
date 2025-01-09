<?php

namespace DTL\OneHourExp\Tests;

use DTL\OneHourExp\Node;
use DTL\OneHourExp\Node\BinaryOpNode;
use DTL\OneHourExp\Node\IntegerNode;
use DTL\OneHourExp\Parser;
use DTL\OneHourExp\Tokenizer;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class ParserTest extends TestCase
{
    #[DataProvider('provideParse')]
    public function testParse(string $expression, ?Node $expectedNode): void
    {
        $tokenizer = new Tokenizer();
        $tokens = $tokenizer->tokenize($expression);

        $ast = (new Parser())->parse($tokens);

        self::assertEquals($expectedNode, $ast);
    }

    public static function provideParse(): Generator
    {
        yield [
            '1',
            new IntegerNode(1),
        ];
        yield [
            '1 + 2',
            new BinaryOpNode(
                new IntegerNode(1),
                '+',
                new IntegerNode(2),
            ),
        ];
    }
}
