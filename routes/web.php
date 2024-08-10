<?php

use App\Http\Controllers\studentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('homepage');
}); // Fixed routing.
Route::get('/register', [studentController::class, "index"]) ;
Route::post('/validation', [studentController::class, "studentValidation"]) ;


