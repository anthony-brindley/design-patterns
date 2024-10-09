<?php

namespace App\Domain\Structural\Adapter;

use App\Domain\Structural\Adapter\Contracts\IsRound;

class RoundPeg implements IsRound
{
    public function __construct(
        private int $radius
    )
    {}

    public function getRadius(): int
    {
        return $this->radius;
    }
}
