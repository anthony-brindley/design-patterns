<?php

namespace App\Domain\Structural\Adapter;

use App\Domain\Structural\Adapter\Contracts\RoundPeg;

class SquarePegAdapter implements RoundPeg
{
    public function __construct(
        protected SquarePeg $peg
    )
    {}

    public function getRadius(): int
    {
        return $this->peg->getWidth();
    }
}
