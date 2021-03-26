<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/', HomeController::class)->only([
    'index', 'store'
]);