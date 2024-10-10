<?php

namespace App\Domain\Behavioral\State\States;

use App\Domain\Behavioral\State\Contracts\IsContext;
use App\Domain\Behavioral\State\Contracts\IsState;

class Attempted extends BaseState
{

    /**
     * @inheritDoc
     */
    public function handle(IsContext $context): IsState 
    {
        $this->setContext($context);
        $this->context->logEvent('Attempted state handler called');

        $this->attemptPayment();
        
        return $this;
    }

    public function attemptPayment(): void
    {
        if($this->didPaymentSucceed(rand(0,9)))
        {
            $this->context->logEvent('Payment succeeded');
            $this->setNextState(new Completed);
        } else {
            $this->context->logEvent('payment failed');
            $this->setNextState(new Failed);
        }
    }

    protected function didPaymentSucceed(int $randomInt): bool
    {
        return $randomInt <= 7; // 70% chance of success
    }
}