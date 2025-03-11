<?php

namespace App\Providers;

use App\Models\Film;
use App\Models\Negara;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::share('tahunList', Film::select('tahun_rilis')->distinct()->orderBy('tahun_rilis', 'desc')->pluck('tahun_rilis'));
        View::share('negaraList', Negara::orderBy('nama_negara', 'asc')->get());

        
    }
}
