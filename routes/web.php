<?php

use App\Http\Controllers\studentController;
use Illuminate\Support\Facades\Route;
Route::resource('students', studentController::class);

<<<<<<< HEAD
//Route::get('/', [studentController::class, ""]) ;
//Route::get('/register', [studentController::class, "index"]) ;
=======
Route::get('/', function(){
    return view('homepage');
}); // Fixed routing.
Route::get('/register', [studentController::class, "index"]) ;
Route::post('/validation', [studentController::class, "studentValidation"]) ;
>>>>>>> c09d9b36e4814b3e39ad1a99d369039efef0e920



// Display a list of students
Route::get('/students', [studentController::class, 'index'])->name('students.index');

// Show the form for creating a new student
Route::get('/students/create', [studentController::class, 'create'])->name('students.create');

// Store a newly created student in the database
Route::post('/students', [studentController::class, 'store'])->name('students.store');

// Display a specific student
Route::get('/students/{id}', [studentController::class, 'show'])->name('students.show');

// Show the form for editing an existing student
Route::get('/students/{id}/edit', [studentController::class, 'edit'])->name('students.edit');

// Update a specific student in the database
Route::put('/students/{id}', [studentController::class, 'update'])->name('students.update');
Route::patch('/students/{id}', [studentController::class, 'update'])->name('students.update');

// Delete a specific student from the database
Route::delete('/students/{id}', [studentController::class, 'destroy'])->name('students.destroy');

