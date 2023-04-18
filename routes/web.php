<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FullCalendarController;
use App\Models\Event;




Route::get('/', [HomeController::class, 'home']);

Route::get('full-calendar', [FullCalendarController::class, 'index'])->name('full-calendar');

Route::post('action', [FullCalendarController::class, 'action'])->name('action');


Route::post('full-calendar/store', [FullCalendarController::class, 'store']);