<?php

namespace App\Domain\Structural\Decorator;

use App\Domain\Structural\Decorator\Contracts\InputFormat;

class TextFormat implements InputFormat
{
    public function __construct(
        protected InputFormat $inputFormat
    ){}

    public function formatText(string $text): string
    {
        return $this->inputFormat->formatText($text);
    }
}
