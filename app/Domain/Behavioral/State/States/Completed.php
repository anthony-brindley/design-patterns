<?php

namespace App\Domain\Behavioral\State\States;

use App\Domain\Behavioral\State\Contracts\IsContext;
use App\Domain\Behavioral\State\Contracts\IsState;

class Completed extends BaseState
{

    /**
     * @inheritDoc
     */
    public function handle(IsContext $context): IsState 
    {
        $this->setContext($context);
        $this->context->logEvent('Completed state handler called');

        return $this;
    }
}