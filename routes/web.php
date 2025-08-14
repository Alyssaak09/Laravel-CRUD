<?php

//use app\Models\Student;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('students', StudentController::class);
Route::resource('course', CourseController::class);


// Route::get('students/{student}/destory',[StudentController::class, 'destory'])->name('students.destory');


// Route::get('course/{cours}/destory',[CourseController::class, 'destory'])->name('course.destory');