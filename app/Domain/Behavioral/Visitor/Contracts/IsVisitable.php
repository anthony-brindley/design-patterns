<?php

namespace App\Domain\Behavioral\Visitor\Contracts;

interface IsVisitable
{
    public function accept(Visitor $visitor): array;
}
