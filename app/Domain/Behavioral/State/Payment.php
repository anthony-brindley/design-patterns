<?php

namespace App\Domain\Behavioral\State;

use App\Domain\Behavioral\State\Contracts\IsContext;
use App\Domain\Behavioral\State\Contracts\IsState;
use App\Domain\Behavioral\State\States\Pending;

class Payment implements IsContext
{
    protected static $initialState = Pending::class;

    private array $events = [];

    private IsState $state;

    public function __construct()
    {
        $this->setInitialState();
    }

    protected function setInitialState(): void
    {
        $this->transitionTo(new self::$initialState);
    }

    public function handle(): array
    {
        // lets trigger the initial state handler
        // will return a state containing a context with latest events.
        $nextState = null;

        do {
            $state = $this->state->handle($this);
            $nextState = $state->getNextState();
            if($nextState)
            {
                $this->transitionTo($nextState);
            }
            
        }
        while($nextState !== null);
        
        return $this->events;
    }

    

    public function transitionTo(IsState $state): IsContext
    {
        $this->logEvent('Transition payment to: '.$state->getIdentifier());
        $this->state = $state;
        $this->state->setContext($this);

        return $this;
    }

    public function getState(): IsState
    {
        return $this->state;
    }

    public function logEvent(string $event): void
    {
        $this->events[] = $event;
    }
}
