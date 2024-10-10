<?php

namespace App\Domain\Creational\Builder;

class CodeRunner
{
    public function runCode(): array
    {
        $foreman = new Foreman;
        $condo = $foreman->buildCondo();

        $tower = $foreman->buildTowerBlock(5);

        $dataToReturn = [
            'condo' => $condo,
            'tower' => $tower
        ];

        return $dataToReturn;
    }
}
