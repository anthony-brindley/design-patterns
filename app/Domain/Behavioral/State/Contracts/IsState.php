<?php

namespace App\Domain\Behavioral\State\Contracts;

use App\Domain\Behavioral\State\Contracts\IsContext;



interface IsState
{
    public function setContext(IsContext $context);
    public function getIdentifier(): string;
    public function getNextState(): ?IsState;
    public function handle(IsContext $context): IsState;
}
