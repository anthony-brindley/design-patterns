<?php

namespace App\Domain\Structural\Facade;

class ClientCode
{
    
    public function runCode(Facade $facade)
    {
        $facade->operation();
    }
}
