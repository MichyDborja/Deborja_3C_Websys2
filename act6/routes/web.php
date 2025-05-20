<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\MapController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/map', [MapController::class, 'showMap']);
Route::get('/weather', [WeatherController::class, 'weather']);