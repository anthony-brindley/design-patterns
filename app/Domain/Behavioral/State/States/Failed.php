<?php

namespace App\Domain\Behavioral\State\States;

use App\Domain\Behavioral\State\Contracts\IsContext;
use App\Domain\Behavioral\State\Contracts\IsState;

class Failed extends BaseState
{

    /**
     * @inheritDoc
     */
    public function handle(IsContext $context): IsState 
    {
        $this->setContext($context);
        $this->context->logEvent('Failed state handler called');

        return $this;
    }
}