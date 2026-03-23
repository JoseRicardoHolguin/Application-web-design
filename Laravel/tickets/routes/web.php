<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketWebController;
Route::get('/', function () {
 return redirect()->route('tickets.index');
});
Route::resource('tickets', TicketWebController::class);