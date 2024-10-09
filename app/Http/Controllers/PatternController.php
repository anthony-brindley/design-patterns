<?php

namespace App\Http\Controllers;

use App\Domain\Behavioral\Visitor\ClientCode;
use App\Domain\Structural\Adapter\CodeRunner;
use Illuminate\Http\Request;

class PatternController extends Controller
{
    public function visitor()
    {
        $visitorRunner = new ClientCode();

        return response()->json($visitorRunner->runCode(), 200);
    }

    public function adapter()
    {
        $adapterRunner = new CodeRunner();

        return response()->json($adapterRunner->runCode(), 200);
    }

    public function decorator()
    {
        $decoratorRunner = new \App\Domain\Structural\Decorator\CodeRunner(); 

        return response()->json($decoratorRunner->runCode(), 200);
    }
}
