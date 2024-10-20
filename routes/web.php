<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Redirect to student index after login
Route::get('/home', [StudentController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {

    Route::prefix('students')->group(function () {

        Route::get('/', [StudentController::class, 'index'])->name('students.index');

        Route::get('/fetch', [StudentController::class, 'fetchStudents'])->name('students.fetch');

        Route::post('/', [StudentController::class, 'store'])->name('students.store');

        Route::get('/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');

        Route::put('/{id}', [StudentController::class, 'update'])->name('students.update');

        Route::delete('/{id}', [StudentController::class, 'destroy'])->name('students.destroy');

        Route::get('/restore/{id}', [StudentController::class, 'restore'])->name('students.restore');
    });

    Route::resource('teachers', TeacherController::class);
});
