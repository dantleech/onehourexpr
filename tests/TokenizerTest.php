<?php

namespace DTL\OneHourExp\Tests;

use DTL\OneHourExp\Token;
use DTL\OneHourExp\TokenType;
use DTL\OneHourExp\Tokenizer;
use DTL\OneHourExp\Tokens;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class TokenizerTest extends TestCase
{
    #[DataProvider('provideTokenize')]
    public function testTokenize(string $expression, array $expectedTokens): void
    {
        $tokenizer = new Tokenizer();
        $tokens = $tokenizer->tokenize($expression);

        self::assertEquals($tokens, new Tokens($expectedTokens));
    }

    public static function provideTokenize(): Generator
    {
        yield ['1', [new Token(TokenType::Integer, '1'), ]];
        yield ['12', [new Token(TokenType::Integer, '12'), ]];
        yield ['+', [
            new Token(TokenType::Plus),
        ]];
        yield ['1 + 1', [
            new Token(TokenType::Integer, '1'),
            new Token(TokenType::Plus),
            new Token(TokenType::Integer, '1'),
        ]];
    }
}
