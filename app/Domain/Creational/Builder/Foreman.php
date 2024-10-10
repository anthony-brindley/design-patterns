<?php

namespace App\Domain\Creational\Builder;

use App\Domain\Creational\Builder\CondoBuilder;
use App\Domain\Creational\Builder\Contracts\IsBuilder;
use App\Domain\Creational\Builder\Contracts\IsBuilding;
use App\Domain\Creational\Builder\TowerblockBuilder;

class Foreman
{

    protected IsBuilder $builder;

    public function setBuilder(IsBuilder $builder)
    {
        $this->builder = $builder;
    }


    protected function build(int $floors): IsBuilding
    {
        $floorCount = $floors;

        for($i = 0; $i < $floorCount; $i++)
        {
            $this->builder->buildFloor();
            $this->builder->buildWalls();
            $this->builder->buildWindows();
            $this->builder->buildDoors();
        }

        $this->builder->buildRoof();

        $this->builder->buildGarage();

        return $this->builder->getResult();
    }

    public function buildTowerBlock(int $floors): IsBuilding
    {
        $this->setBuilder(new TowerblockBuilder);
        return $this->build($floors);
    }

    public function buildCondo()
    {
        $this->setBuilder(new CondoBuilder);
        return $this->build(1);
    }
}
