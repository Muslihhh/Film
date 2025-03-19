<?php

use App\View\Components\dashboard;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\filmcontroller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\NegaraController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WatchlistController;
use App\Http\Controllers\AuthorFilmController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;




Route::get('/test-email', function () {
    Mail::raw('Tes email berhasil!', function ($message) {
        $message->to('test@example.com')->subject('Testing Laravel SMTP');
    });

    return 'Email telah dikirim!';
});
// route::get('/datafilm',[FilmController::class, 'index']);

// Route::middleware('auth')->group(function () {
    
// });

Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

//  Halaman Utama (Subscriber)
Route::get('/', [DashboardController::class, 'subscriberDashboard'])->name('dashboard.subscriber');
Route::get('/films/terbaru', [FilmController::class, 'latestFilms'])->name('films.latest');
Route::get('/films/rating-tertinggi', [FilmController::class, 'topRatedFilms'])->name('films.topRated');

Route::get('/genre', [GenreController::class, 'list'])->name('genres.list');
Route::get('/films/{slug}', [FilmController::class, 'show'])->name('films.detail');
Route::get('/films/{film}/comments', [KomentarController::class, 'show'])->name('films.comments');
Route::middleware('auth')->group(function () {
    Route::get('/watchlist', [WatchlistController::class, 'index'])->name('watchlist.index');
    Route::post('/watchlist/{film_id}', [WatchlistController::class, 'store'])->name('watchlist.store');
    Route::delete('/watchlist/{film_id}', [WatchlistController::class, 'destroy'])->name('watchlist.destroy');
    Route::post('/watchlist/toggle/{film_id}', [WatchlistController::class, 'toggleWatchlist'])->name('watchlist.toggle');
    Route::post('/films/{film_id}/komentar', [KomentarController::class, 'store'])->name('komentar.store');
    
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

//  Middleware untuk Admin
Route::middleware(['auth', RoleMiddleware::class . ':admin'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'adminDashboard'])->name('dashboard.admin');
    Route::resource('/admin/films', FilmController::class);
    Route::resource('/admin/komentars', KomentarController::class);
    Route::resource('/admin/genres', GenreController::class);
    Route::resource('/admin/users', UserController::class);
    Route::resource('/admin/negaras', NegaraController::class);
});

//  Middleware untuk Author
Route::middleware(['auth', RoleMiddleware::class . ':author'])->group(function () {
    Route::get('/author', [DashboardController::class, 'authorDashboard'])->name('dashboard.author');
    Route::resource('/author/film', AuthorController::class)->except(['show']);
});




