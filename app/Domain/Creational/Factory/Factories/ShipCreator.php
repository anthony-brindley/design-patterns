<?php

namespace App\Domain\Creational\Factory\Factories;

use App\Domain\Creational\Factory\Contracts\IsVehicle;
use App\Domain\Creational\Factory\VehicleCreator;
use App\Domain\Creational\Factory\Vehicles\Ship;

class ShipCreator extends VehicleCreator
{

    /**
     * @inheritDoc
     */
    public function createVehicle(): IsVehicle 
    {
        return new Ship();
    }
}
