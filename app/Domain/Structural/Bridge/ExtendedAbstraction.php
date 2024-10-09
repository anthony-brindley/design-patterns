<?php

namespace App\Domain\Structural\Bridge;

class ExtendedAbstraction extends Abstraction
{
    public function operation(): mixed
    {
        return "extended operation output";
    }
}
