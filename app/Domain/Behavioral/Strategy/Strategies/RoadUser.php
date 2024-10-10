<?php

namespace App\Domain\Behavioral\Strategy\Strategies;
use App\Domain\Behavioral\Strategy\Contracts\Strategy;

class RoadUser implements Strategy
{

    /**
     * @inheritDoc
     */
    public function buildRoute(): string 
    {
        return 'Route composed using roads';
    }
}
