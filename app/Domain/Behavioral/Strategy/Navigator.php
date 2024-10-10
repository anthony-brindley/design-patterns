<?php

namespace App\Domain\Behavioral\Strategy;

use App\Domain\Behavioral\Strategy\Contracts\Strategy;

class Navigator
{
    protected Strategy $strategy;

    public function __construct(
        Strategy $initialStrategy
    )
    {
        $this->strategy = $initialStrategy;
    }

    public function setStrategy(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function navigate(): string
    {
        return $this->strategy->buildRoute();
    }
}
