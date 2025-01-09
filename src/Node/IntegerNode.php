<?php

namespace DTL\OneHourExp\Node;

use DTL\OneHourExp\Node;

final readonly class IntegerNode implements Node
{
    public function __construct(public int $value)
    {
    }
}
