<?php

namespace DTL\OneHourExp;

use DTL\OneHourExp\Node\BinaryOpNode;
use DTL\OneHourExp\Node\IntegerNode;
use Exception;
use RuntimeException;

class Evaluator
{
    public function evaluate(Node $node): int
    {
        if ($node instanceof IntegerNode) {
            return $node->value;
        }

        if ($node instanceof BinaryOpNode) {

            $leftValue = $this->evaluate($node->left);
            $rightValue = $this->evaluate($node->right);

            return match ($node->operator) {
                '+' => $leftValue + $rightValue,
                '-' => $leftValue - $rightValue,
                '*' => $leftValue * $rightValue,
                default => throw new Exception(sprintf(
                    'Unknown operator: %s',
                    $node->operator
                )),
            };
        }

        throw new RuntimeException(sprintf(
            'Do not know how to evaluate node: %s',
            $node::class
        ));
    }
}
