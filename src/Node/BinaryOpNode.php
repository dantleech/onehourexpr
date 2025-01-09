<?php

namespace DTL\OneHourExp\Node;

use DTL\OneHourExp\Node;

class BinaryOpNode implements Node
{
    public function __construct(
        public Node $left,
        public string $operator,
        public Node $right,
    )
    {
    }
}
