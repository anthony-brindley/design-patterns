<?php

namespace App\Domain\Behavioral\State;

use App\Domain\Behavioral\State\States\Pending;

class CodeRunner
{
    public function runCode(): array
    {
        $payment = new Payment();

        $paymentEvents = $payment->handle();

        return $paymentEvents;
    }
}
