<?php

namespace App\Domain\Creational\Factory\Contracts;

interface IsVehicle
{
    public function getRegistrationText(string $color): string;
}
