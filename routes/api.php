<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::apiResource('produtos', ProductController::class);
