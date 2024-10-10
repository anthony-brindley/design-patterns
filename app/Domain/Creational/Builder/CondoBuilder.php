<?php

namespace App\Domain\Creational\Builder;

use App\Domain\Creational\Builder\Contracts\IsBuilder;
use App\Domain\Creational\Builder\Condo;
use App\Domain\Creational\Builder\Contracts\IsBuilding;

class CondoBuilder implements IsBuilder
{
    private IsBuilding $condo;

    public function __construct()
    {
        $this->reset();
    }

    /**
     * @inheritDoc
     */
    public function buildFloor(): void 
    {
        $this->condo->applyProcess('Add Condo Floor');
    }


    /**
     * @inheritDoc
     */
    public function buildDoors(): void 
    {
        $this->condo->applyProcess('Add Condo Doors');
    }
    
    /**
     * @inheritDoc
     */
    public function buildGarage(): void 
    {
        $this->condo->applyProcess('Add Condo Garage');
    }
    
    /**
     * @inheritDoc
     */
    public function buildRoof(): void 
    {
        $this->condo->applyProcess('Add Condo Roof');
    }
    
    /**
     * @inheritDoc
     */
    public function buildWalls(): void 
    {
        $this->condo->applyProcess('Add Condo Walls');
    }
    
    /**
     * @inheritDoc
     */
    public function buildWindows(): void 
    {
        $this->condo->applyProcess('Add Condo Windows');
    }
    
    /**
     * @inheritDoc
     */
    public function getResult(): IsBuilding
    {
        return $this->condo;
    }

    /**
     * @inheritDoc
     */
    public function reset(): void 
    {
        $this->condo = new Condo;
    }
}
