<?php

namespace DTL\OneHourExp;

class Token
{
    public function __construct(
        public TokenType $type,
        public ?string $value = null
    )
    {
    }
}
