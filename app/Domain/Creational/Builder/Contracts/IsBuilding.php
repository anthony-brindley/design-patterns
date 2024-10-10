<?php

namespace App\Domain\Creational\Builder\Contracts;

interface IsBuilding
{
    public function applyProcess(string $process);
}
