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

    public function state()
    {
        $stateRunner = new \App\Domain\Behavioral\State\CodeRunner();

        return response()->json($stateRunner->runCode(), 200);
    }

    public function strategy()
    {
        $strategyRunner = new \App\Domain\Behavioral\Strategy\CodeRunner;

        return response()->json($strategyRunner->runCode(), 200);
    }

    public function factory()
    {
        $factoryRunner = new \App\Domain\Creational\Factory\CodeRunner;

        return response()->json($factoryRunner->runCode(), 200);
    }

    public function builder()
    {
        $builderRunner = new \App\Domain\Creational\Builder\CodeRunner;
        //new \App\Domain\Creational\Builder\CodeRunner;
        return response()->json($builderRunner->runCode(), 200);
    }
}
