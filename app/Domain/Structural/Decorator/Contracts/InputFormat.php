<?php

namespace App\Domain\Structural\Decorator\Contracts;

interface InputFormat
{
    public function formatText(string $text): string;
}
