<?php

use App\Http\Controllers\filmcontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.home');
});
Route::get('/admin', function () {
    return view('admin.dashboard');
});
Route::get('/film', function () {
    return view('user.film');
});
Route::get('/login', function () {
    return view('Login.form_login');
});
Route::get('/datafilm', function () {
    return view('admin.film.datafilm');
});

// route::get('/datafilm',[FilmController::class, 'index']);
Route::get('/datagenre', function () {
    return view('admin.genre.datagenre');
});
Route::get('/datanegara', function () {
    return view('admin.negara.datanegara');
});
Route::get('/datauser', function () {
    return view('admin.user.datauser');
});
Route::get('/datatahun', function () {
    return view('admin.tahun.datatahun');
});
Route::get('/admin/film/addfilm', function () {
    return view('admin.film.addfilm');
});
