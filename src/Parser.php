<?php

namespace DTL\OneHourExp;

use DTL\OneHourExp\Node\BinaryOpNode;
use DTL\OneHourExp\Node\IntegerNode;
use RuntimeException;

class Parser
{
    public function parse(Tokens $tokens): Node
    {
        $token = $tokens->take();

        $node = null;

        if ($token->type === TokenType::Integer) {
            $node = new IntegerNode((int)$token->value);
        }

        if (null === $node) {
            throw new RuntimeException(sprintf(
                'Do not know what to do thanks: %s', $token->type->name
            ));
        }


        $token = $tokens->take();
        if ($token === null) {
            return $node;
        }

        return new BinaryOpNode(
            $node,
            match ($token->type) {
                TokenType::Plus => '+',
                TokenType::Minus => '-',
                TokenType::Multiply => '*',
                default => throw new RuntimeException(sprintf(
                    'Unknown operator: %s', $token->name
                )),
            },
            $this->parse($tokens),
        );
    }
}
