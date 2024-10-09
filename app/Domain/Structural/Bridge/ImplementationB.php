<?php

namespace App\Domain\Structural\Bridge;
use App\Domain\Structural\Bridge\Contracts\Implementation;

class ImplementationB implements Implementation
{

    /**
     * @inheritDoc
     */
    public function operation(): mixed 
    {
        return 'Implementation B output';
    }
}
