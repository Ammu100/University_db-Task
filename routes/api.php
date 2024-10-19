<?php


use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'student', 'middleware' => 'auth:sanctum'], function () {
    Route::post('add', [StudentController::class, 'store']);
    Route::post('list', [StudentController::class, 'index']);
    Route::post('update', [StudentController::class, 'update']);
    Route::post('delete', [StudentController::class, 'destroy']);
});


Route::group(['prefix' => 'teacher', 'middleware' => 'auth:sanctum'], function () {
    Route::post('add', [TeacherController::class, 'store']);
    Route::post('list', [TeacherController::class, 'index']);
    Route::post('update', [TeacherController::class, 'update']);
    Route::post('delete', [TeacherController::class, 'destroy']);
});