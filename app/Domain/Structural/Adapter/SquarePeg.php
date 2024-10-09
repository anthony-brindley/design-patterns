<?php

namespace App\Domain\Structural\Adapter;

class SquarePeg
{

    public function __construct(
        private int $width
    )
    {}

    public function getWidth(): int
    {
        return $this->width;   
    }
}
