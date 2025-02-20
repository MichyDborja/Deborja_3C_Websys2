<?php
use App\Http\Controllers\MathController; // Gamitin yung MathController para sa computations
use Illuminate\Support\Facades\Route; // Import ang Route facade para makagawa ng URL routes

//  Gumawa ng GET route na may tatlong parameters: operation, num1, at num2
Route::get('/{operation}/{num1}/{num2}', [MathController::class, 'calculate']); 
//  {operation}  (add, subtract, multiply, divide)
//  {num1} & {num2}  Mga numbers na ica-calculate
//  [MathController::class, 'calculate'] → Tatawagin yung calculate() function sa MathController