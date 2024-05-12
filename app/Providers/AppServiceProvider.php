<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\StaffRepositoryInterface;
use App\Repository\StaffRepository; 

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(StaffRepositoryInterface::class, StaffRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
    
}
