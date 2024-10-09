<?php

namespace App\Domain\Structural\Bridge;

use App\Domain\Structural\Bridge\Contracts\Implementation;

class Abstraction
{
    public function __construct(
        protected Implementation $implementation
    )
    {}

    public function operation(): mixed
    {
        return $this->implementation->operation();
    }
}
