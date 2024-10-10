<?php

namespace App\Domain\Behavioral\State\States;

use App\Domain\Behavioral\State\Contracts\IsContext;
use App\Domain\Behavioral\State\Contracts\IsState;

class Pending extends BaseState
{

    public function handle(IsContext $context): IsState
    {
        $this->setContext($context);
        $this->context->logEvent('Pending state handler called');

        $this->setNextState(new Attempted);

        return $this;
    }
}
