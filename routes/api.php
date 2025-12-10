<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CounterController;

Route::post('/views/{page}', [CounterController::class, 'increment']);
Route::get('/views/{page}', [CounterController::class, 'total']);
