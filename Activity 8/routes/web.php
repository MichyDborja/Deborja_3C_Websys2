<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudInsertController;
use App\Http\Controllers\StudViewController;
use App\Http\Controllers\StudUpdateController;
use App\Http\Controllers\StudDeleteController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('insert',[StudInsertController::class, 'insertform']);
Route::post('create',[StudInsertController::class, 'insert']);


Route::get('view-records',[StudViewController::class, 'index']);

Route::get('edit-records',[StudUpdateController::class, 'index']);
Route::get('edit/{id}',[StudUpdateController::class, 'show']);
Route::post('edit/{id}',[StudUpdateController::class, 'edit']);

Route::get('delete-records',[StudDeleteController::class, 'index']);
Route::get('delete/{id}',[StudDeleteController::class, 'destroy']);