<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlapController;
Route::resource('alap', FeladatokController::class);

Route::get('/', function () {return view('welcome');});

Route::get('/alap', [AlapController::class, 'index']); 