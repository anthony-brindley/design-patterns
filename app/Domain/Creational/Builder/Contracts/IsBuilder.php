<?php

namespace App\Domain\Creational\Builder\Contracts;

use App\Domain\Creational\Builder\Contracts\IsBuilding;

interface IsBuilder
{
    // each step should be outlined here
    public function reset(): void;
    public function buildFloor(): void;
    public function buildWalls(): void;
    public function buildDoors(): void;
    public function buildWindows(): void;
    public function buildRoof(): void;
    public function buildGarage(): void;
    public function getResult(): IsBuilding;
}
