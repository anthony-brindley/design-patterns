<?php

namespace App\Domain\Creational\Builder;

use App\Domain\Creational\Builder\Contracts\IsBuilding;

abstract class BaseBuilding implements IsBuilding
{
    public array $process = [];

    public function applyProcess(string $process)
    {
        $this->process[] = $process;        
    }
}
