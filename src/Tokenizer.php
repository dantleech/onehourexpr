<?php

namespace DTL\OneHourExp;

use RuntimeException;

class Tokenizer
{
    public function tokenize(string $expression): Tokens 
    {
        $offset = 0;
        $tokens = [];
        while (isset($expression[$offset])) {
            $char = $expression[$offset++];

            if (is_numeric($char)) {
                while (is_numeric($expression[$offset] ?? null)) {
                    $char .= $expression[$offset++];
                }
                $tokens[] = new Token(TokenType::Integer, $char);
                continue;
            }

            $token = match ($char) {
                '+' => new Token(TokenType::Plus),
                '-' => new Token(TokenType::Minus),
                '*' => new Token(TokenType::Multiply),
                ' ' => null,
                default => throw new RuntimeException(sprintf(
                    'Invalid operator: "%s"', $char
                )),
            };

            if ($token === null) {
                continue;
            }

            $tokens[] = $token;
        }

        return new Tokens($tokens);
    }
}
