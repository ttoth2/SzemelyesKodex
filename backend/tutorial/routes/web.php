<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TesztController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/teszt', [TesztController::class, 'teszt']);
Route::get('/names', [TesztController::class, 'names']);
Route::get('/names/create/{family}/{name}', [TesztController::class, 'namesCreate']);
Route::get('/families/create/{name}', [TesztController::class, 'familyCreate']);
