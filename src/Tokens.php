<?php

namespace DTL\OneHourExp;

use ArrayIterator;
use IteratorAggregate;
use Traversable;

class Tokens implements IteratorAggregate
{
    private int $offset = 0;

    public function __construct(private array $tokens)
    {
    }
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->tokens);
    }

    public function take(): ?Token
    {
        return $this->tokens[$this->offset++] ?? null;
    }
}
