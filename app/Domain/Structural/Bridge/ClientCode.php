<?php

namespace App\Domain\Structural\Bridge;

class ClientCode
{
    // if we were to run the code
    public function runCode()
    {
        $abstraction = new Abstraction(new ImplementationA);
        $abstraction->operation();
    }
}
