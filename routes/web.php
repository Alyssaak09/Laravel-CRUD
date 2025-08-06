<?php

use app\Models\Student;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::resource('students', StudentController::class);
Route::get('/', function () {
    return view('welcome');
});

Route::resource('students', StudentController::class);

Route::get('students/{student}/destroy', [StudentController::class, 'destory'])->name('students.destroy');
  
