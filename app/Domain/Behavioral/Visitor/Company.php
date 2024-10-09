<?php

namespace App\Domain\Behavioral\Visitor;

use App\Domain\Behavioral\Visitor\Contracts\IsVisitable;
use App\Domain\Behavioral\Visitor\Contracts\Visitor;

class Company implements IsVisitable
{
    public function __construct(
        private string $name,
        private array $departments
    )
    {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getDepartments(): array
    {
        return $this->departments;
    }

    /**
     * @inheritDoc
     */
    public function accept(Visitor $visitor): array 
    {
        return $visitor->visitCompany($this);
    }
}
