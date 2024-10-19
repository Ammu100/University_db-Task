<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return "<h1>UNIVERSITY DATABASE</h1>";
});

// Route::get('home', function () {
//     return "<h1 style='text-align:center;color:red;margin-top:20%;'>Welcome to Sale CRM</h1>";
// });

Route::get('/', function () {
    return view('index');
});