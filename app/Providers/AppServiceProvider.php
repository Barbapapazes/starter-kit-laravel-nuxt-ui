<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
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
        $this->loadAuthRoutes();
    }

    /**
     * Load the auth routes.
     */
    private function loadAuthRoutes(): void
    {
        Route::middleware('web')
            ->group(base_path('routes/auth.php'));
    }
}
