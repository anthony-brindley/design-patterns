<?php

namespace App\Domain\Behavioral\State\Contracts;

interface IsContext
{
    public function logEvent(string $event): void;
    public function transitionTo(IsState $state): IsContext;
}
