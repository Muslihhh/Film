<?php

use App\View\Components\dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\filmcontroller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\NegaraController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\DashboardController;


Route::get('/film', function () {
    return view('user.film');
});



// route::get('/datafilm',[FilmController::class, 'index']);

// Route::middleware('auth')->group(function () {
    
// });

Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [DashboardController::class, 'subscriberDashboard'])->name('dashboard.subscriber');
Route::get('/films/terbaru', [FilmController::class, 'latestFilms'])->name('films.latest');
Route::get('/films/rating-tertinggi', [FilmController::class, 'topRatedFilms'])->name('films.topRated');
Route::post('/films/{film_id}/komentar', [KomentarController::class, 'store'])->name('komentar.store');
Route::get('/genre', [GenreController::class, 'list'])->name('genres.list');
Route::middleware('auth')->group(function () {
    Route::get('/admin', [DashboardController::class, 'adminDashboard'])->name('dashboard.admin');
    Route::get('/author', [DashboardController::class, 'authorDashboard'])->name('dashboard.author');
    
    Route::resource('films', FilmController::class);
    Route::resource('genres', GenreController::class);
    Route::resource('users', UserController::class);
    Route::resource('negaras', NegaraController::class);
    
});


