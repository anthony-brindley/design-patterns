<?php

namespace App\Domain\Structural\Adapter;

use App\Domain\Structural\Adapter\Contracts\IsRound;

class RoundHole implements IsRound
{
    public function __construct(
        private int $radius
    )
    {}

    public function getRadius(): int
    {
        return $this->radius;
    }

    public function fits(RoundPeg $peg): bool
    {
        return $this->getRadius() >= $peg->getRadius();
    }
}
