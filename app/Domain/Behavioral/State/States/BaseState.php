<?php

namespace App\Domain\Behavioral\State\States;

use App\Domain\Behavioral\State\Contracts\IsContext;
use App\Domain\Behavioral\State\Contracts\IsState;
use Illuminate\Support\Str;

abstract class BaseState implements IsState
{
    protected IsContext $context;
    protected ?IsState $nextState = null;

    public function setContext(IsContext $context)
    {
        $this->context = $context;
    }

    protected function setNextState(IsState $state): void
    {
        $this->nextState = $state;
    }

    public function getNextState(): ?IsState
    {
        return $this->nextState;
    }

    public function getIdentifier(): string
    {
        return Str::lower(class_basename(static::class));
    }

    abstract function handle(IsContext $context): IsState;
    
}
