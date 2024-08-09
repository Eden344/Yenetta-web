<?php

use App\Http\Controllers\studentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [studentController::class, ""]) ;
Route::get('/register', [studentController::class, "index"]) ;


