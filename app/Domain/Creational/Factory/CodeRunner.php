<?php

namespace App\Domain\Creational\Factory;

use App\Domain\Creational\Factory\Factories\ShipCreator;
use App\Domain\Creational\Factory\Factories\TruckCreator;

class CodeRunner
{
    public function runCode(): array
    {
        $shipFactory = new ShipCreator;
        $ship = $shipFactory->createAndRegisterVehicle("red");

        $truckFactory = new TruckCreator;
        $truck = $truckFactory->createAndRegisterVehicle('pink');

        $dataToReturn = [
            'ship_creator' => $ship,
            'truck_creator' => $truck
        ];

        return $dataToReturn;
    }
}
