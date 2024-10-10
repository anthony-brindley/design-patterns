<?php

namespace App\Domain\Behavioral\Strategy\Contracts;

interface Strategy
{
    public function buildRoute(): string;
}
