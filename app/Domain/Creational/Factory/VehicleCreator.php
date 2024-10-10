<?php

namespace App\Domain\Creational\Factory;

use App\Domain\Creational\Factory\Contracts\IsVehicle;

abstract class VehicleCreator
{
    abstract public function createVehicle(): IsVehicle;

    public function createAndRegisterVehicle(string $vehicleColor)
    {
        $vehicle = $this->createVehicle();

        $registeredText = $vehicle->getRegistrationText($vehicleColor);

        return $registeredText;
    }
}
