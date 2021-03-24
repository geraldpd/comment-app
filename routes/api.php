<?php

use App\Http\Controllers\HomeController;

Route::apiResource('/', HomeController::class)->only([
    'index', 'store'
]);