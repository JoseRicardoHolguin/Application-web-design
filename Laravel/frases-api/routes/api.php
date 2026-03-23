<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteController;

Route::apiResource('quotes', QuoteController::class);