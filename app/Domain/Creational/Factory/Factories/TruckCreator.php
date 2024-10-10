<?php

namespace App\Domain\Creational\Factory\Factories;

use App\Domain\Creational\Factory\Contracts\IsVehicle;
use App\Domain\Creational\Factory\VehicleCreator;
use App\Domain\Creational\Factory\Vehicles\Truck;

class TruckCreator extends VehicleCreator
{
    /**
     * @inheritDoc
     */
    public function createVehicle(): IsVehicle 
    {
        return new Truck();
    }
}
