<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('personal-info', [FormController::class,'showForm'])->name('personal-info');
Route::post('personal-info', [FormController::class, 'handleForm']);
Route::post('/output', [FormController::class, 'handleForm']);
