<?php

namespace App\Domain\Creational\Factory\Vehicles;

use App\Domain\Creational\Factory\Contracts\IsVehicle;
use Illuminate\Support\Str;

class BaseVehicle implements IsVehicle
{
    public function getRegistrationText(string $color): string
    {
        $type = $this->getVehicleType();

        return "Registered a ".$color." ".$type;
    }

    protected function getVehicleType(): string
    {
        $base = class_basename(static::class);
        return strtolower($base);
    }
}
