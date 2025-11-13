<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SubjectController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('students.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::middleware(['auth'])->group(function () {
   
    Route::get('/students/print', [StudentController::class, 'print'])->name('students.print');
    Route::resource('students', StudentController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('subjects', SubjectController::class);

    Route::get('/courses/{course}/subjects', [StudentController::class, 'getSubjects'])
        ->name('courses.subjects');



});

