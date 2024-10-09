<?php

namespace App\Domain\Behavioral\Visitor;

use App\Domain\Behavioral\Visitor\Contracts\Visitor;

class Department
{
    /**
     * @param string $name
     * @param Employee[]
     */
    public function __construct(
        private string $name,
        private array $employees
    )
    {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmployees(): array
    {
        return $this->employees;
    }

    public function getCost(): int
    {
        $cost = 0;
        foreach ($this->employees as $employee) {
            $cost += $employee->getSalary();
        }

        return $cost;
    }

    public function accept(Visitor $visitor): array
    {
        return $visitor->visitDepartment($this);
    }
}
