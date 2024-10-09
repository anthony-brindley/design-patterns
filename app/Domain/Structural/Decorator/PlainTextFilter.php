<?php

namespace App\Domain\Structural\Decorator;

use App\Domain\Structural\Decorator\TextFormat;

class PlainTextFilter extends TextFormat
{
    public function formatText(string $text): string
    {
        $text = parent::formatText($text);
        return strip_tags($text);
    }
}
