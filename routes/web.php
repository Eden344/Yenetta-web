<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthenticationController;


Route::resource('students', studentController::class);

Route::get('/',[AuthenticationController::class, 'showCorrectPage']);
Route::get('/login', [AuthenticationController::class, 'displayLoginForm']);
Route::get('/register', [AuthenticationController::class, 'displayRegisterForm']);
Route::post('/login-validation', [AuthenticationController::class, 'login']);
Route::post('/register-validation', [AuthenticationController::class, 'register']);
Route::get('/logout', [AuthenticationController::class, 'logout']);

// Display a list of students
Route::get('/students', [studentController::class, 'index'])->name('students.index');

// Show the list of unpaid students
Route::get('/unpaid_students', [studentController::class, 'unpaid_students'])->name('unpaid_students');
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

Route::resource('/schedules', ScheduleController::class);
Route::get('/schedules/{id}/students', [ScheduleController::class, 'showStudentsBySchedule'])->name('schedules.students');

Route::get('/attendance/mark', [AttendanceController::class, 'markAttendanceForm'])->name('attendance.mark_form');
Route::get('/show-filtered-attendance', [AttendanceController::class, 'filtered_attendance']);
Route::post('/attendance/mark', [AttendanceController::class, 'markAttendance'])->name('attendance.mark');
Route::get('/attendance/report', [AttendanceController::class, 'attendanceReport'])->name('attendance.report');


Route::post('/attendance/submit', [AttendanceController::class, 'submitAttendance'])->name('attendance.submit');
