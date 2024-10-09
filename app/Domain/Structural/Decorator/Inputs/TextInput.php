<?php

namespace App\Domain\Structural\Decorator\Inputs;

use App\Domain\Structural\Decorator\Contracts\InputFormat;

class TextInput implements InputFormat
{

    /**
     * @inheritDoc
     */
    public function formatText(string $text): string 
    {
        return $text;
    }
}
