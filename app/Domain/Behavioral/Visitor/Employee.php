<?php

namespace App\Domain\Behavioral\Visitor;

use App\Domain\Behavioral\Visitor\Contracts\Visitor;

class Employee
{
    public function __construct(
        private string $name,
        private string $position,
        private int $salary
    )
    {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getPosition(): string
    {
        return $this->position;
    }

    public function getSalary(): int
    {
        return $this->salary;
    }

    public function accept(Visitor $visitor): array
    {
        return $visitor->visitEmployee($this);
    }
}
