<?php

namespace App\Domain\Behavioral\Strategy;

use App\Domain\Behavioral\Strategy\Strategies\BoatUser;
use App\Domain\Behavioral\Strategy\Strategies\RoadUser;

class CodeRunner
{
    public function runCode(): array
    {
        $navigator = new Navigator(new RoadUser);
        $defaultOutcome = $navigator->navigate();

        $navigator->setStrategy(new BoatUser);
        $alternateOutcome = $navigator->navigate();


        $dataToReturn = [
            'default' => $defaultOutcome,
            'alternate' => $alternateOutcome
        ];

        return $dataToReturn;
    }
}
