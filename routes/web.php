<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/admin', function () {
    return view('admin.dashboard');
});
Route::get('/film', function () {
    return view('film');
});
Route::get('/login', function () {
    return view('Login.form_login');
});
Route::get('/datafilm', function () {
    return view('admin.datafilm');
});
Route::get('/datagenre', function () {
    return view('admin.datagenre');
});
Route::get('/datanegara', function () {
    return view('admin.datanegara');
});
Route::get('/datauser', function () {
    return view('admin.datauser');
});
Route::get('/datatahun', function () {
    return view('admin.datatahun');
});
