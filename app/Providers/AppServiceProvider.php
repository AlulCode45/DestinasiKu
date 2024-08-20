<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('App\Repositories\DestinationRepositoryInterface', 'App\Repositories\DestinationRepository');
        $this->app->bind('App\Repositories\DestinationCompanyRepositoryInterface', 'App\Repositories\DestinationCompanyRepository');
        $this->app->bind('App\Repositories\DistrictRepositoryInterface', 'App\Repositories\DistrictRepository');
        $this->app->bind('App\Repositories\GuestRepositoryInterface', 'App\Repositories\GuestRepository');
        $this->app->bind('App\Repositories\ProvinceRepositoryInterface', 'App\Repositories\ProvinceRepository');
        $this->app->bind('App\Repositories\RatingRepositoryInterface', 'App\Repositories\RatingRepository');
        $this->app->bind('App\Repositories\RegencyRepositoryInterface', 'App\Repositories\RegencyRepository');
        $this->app->bind('App\Repositories\TestemonialRepositoryInterface', 'App\Repositories\TestemonialRepository');
        $this->app->bind('App\Repositories\VillageRepositoryInterface', 'App\Repositories\VillageRepository');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}