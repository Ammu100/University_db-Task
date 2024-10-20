<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Auth;

// Welcome page
Route::get('/', function () {
    return view('welcome');
});

// Authentication routes (Laravel built-in)
Auth::routes();

// Redirect to student index after login
Route::get('/home', [StudentController::class, 'index'])->name('home');

// Grouped routes that require authentication
Route::middleware(['auth'])->group(function () {
    // Student Routes
    Route::prefix('students')->group(function () {
        // Show student listing page
        Route::get('/', [StudentController::class, 'index'])->name('students.index');

        // AJAX route to fetch students for DataTables
        Route::get('/fetch', [StudentController::class, 'fetchStudents'])->name('students.fetch');

        // Store a new student
        Route::post('/', [StudentController::class, 'store'])->name('students.store');

        // Show form for editing a student
        Route::get('/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');

        // Update student details
        Route::put('/{id}', [StudentController::class, 'update'])->name('students.update');

        // Soft delete a student
        Route::delete('/{id}', [StudentController::class, 'destroy'])->name('students.destroy');

        // Restore a soft-deleted student (if needed)
        Route::get('/restore/{id}', [StudentController::class, 'restore'])->name('students.restore');
    });

    // Teacher routes
    Route::resource('teachers', TeacherController::class);
});
