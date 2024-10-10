<?php

use App\Http\Controllers\PatternController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('visitor', [PatternController::class, 'visitor']);
Route::get('adapter', [PatternController::class, 'adapter']);
Route::get('decorator', [PatternController::class, 'decorator']);
Route::get('state', [PatternController::class, 'state']);
Route::get('strategy', [PatternController::class, 'strategy']);
Route::get('factory', [PatternController::class, 'factory']);