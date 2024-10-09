<?php

namespace App\Http\Controllers;

use App\Domain\Behavioral\Visitor\ClientCode;
use Illuminate\Http\Request;

class PatternController extends Controller
{
    public function visitor()
    {
        $visitorRunner = new ClientCode();

        return response()->json($visitorRunner->runCode(), 200);
    }
}
