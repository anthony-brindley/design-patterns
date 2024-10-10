<?php

namespace App\Domain\Creational\Builder;

use App\Domain\Creational\Builder\Contracts\IsBuilder;
use App\Domain\Creational\Builder\Contracts\IsBuilding;
use App\Domain\Creational\Builder\Towerblock;

class TowerblockBuilder implements IsBuilder
{
    private IsBuilding $towerBlock;

    public function __construct()
    {
        $this->reset();
    }

    /**
     * @inheritDoc
     */
    public function buildFloor(): void 
    {
        $this->towerBlock->applyProcess('Add towerBlock Floor');
    }


    /**
     * @inheritDoc
     */
    public function buildDoors(): void 
    {
        $this->towerBlock->applyProcess('Add towerBlock Doors');
    }
    
    /**
     * @inheritDoc
     */
    public function buildGarage(): void 
    {
        $this->towerBlock->applyProcess('Unable to add towerBlock Garage');
    }
    
    /**
     * @inheritDoc
     */
    public function buildRoof(): void 
    {
        $this->towerBlock->applyProcess('Add towerBlock Roof');
    }
    
    /**
     * @inheritDoc
     */
    public function buildWalls(): void 
    {
        $this->towerBlock->applyProcess('Add towerBlock Walls');
    }
    
    /**
     * @inheritDoc
     */
    public function buildWindows(): void 
    {
        $this->towerBlock->applyProcess('Add towerBlock Windows');
    }
    
    /**
     * @inheritDoc
     */
    public function getResult(): IsBuilding
    {
        return $this->towerBlock;
    }

    /**
     * @inheritDoc
     */
    public function reset(): void 
    {
        $this->towerBlock = new Towerblock;
    }
}
