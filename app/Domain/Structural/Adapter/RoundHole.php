<?php

namespace App\Domain\Structural\Adapter;
use App\Domain\Structural\Adapter\Contracts\RoundPeg;

class RoundHole implements RoundPeg
{
    public function getRadius(): int
    {
        return 1;
    }
}
