<?php

namespace App\Domain\Structural\Adapter;

use App\Domain\Structural\Adapter\RoundPeg;

class SquarePegAdapter extends RoundPeg
{
    public function __construct(
        protected SquarePeg $peg
    )
    {}

    public function getRadius(): int
    {
        return $this->peg->getWidth() / 2;
    }
}
