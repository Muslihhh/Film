<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/admin', function () {
    return view('dashboard');
});
Route::get('/film', function () {
    return view('film');
});
Route::get('/login', function () {
    return view('Login.form_login');
});
