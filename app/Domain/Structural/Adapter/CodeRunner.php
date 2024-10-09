<?php

namespace App\Domain\Structural\Adapter;

use App\Domain\Structural\Adapter\RoundHole;
use App\Domain\Structural\Adapter\RoundPeg;

class CodeRunner
{
    public function runCode(): array
    {
        $hole = new RoundHole(2);
        $roundPeg = new RoundPeg(2);
        
        $roundPegFits = $hole->fits($roundPeg);

        $smallSquarePeg = new SquarePeg(1);
        $largeSquarePeg = new SquarePeg(10);

        // This will throw an error due to incompatible types 
        //$smallSquarePegFits = $hole.fits($smallSquarePeg);

        $smallAdaptedSquarePeg = new SquarePegAdapter($smallSquarePeg);
        $largeAdaptedSquarePeg = new SquarePegAdapter($largeSquarePeg);

        $smallSquarePegFits = $hole->fits($smallAdaptedSquarePeg);
        $largeSquarePegFits = $hole->fits($largeAdaptedSquarePeg);

        $dataForReturn = [
            'round_peg_fits' => $roundPegFits,
            'small_adapted_square_peg_fits' => $smallSquarePegFits,
            'large_adapted_square_peg_fits' => $largeSquarePegFits
        ];

        return $dataForReturn;
    }
}
