<?php

namespace App\Providers;

use App\Interfaces\CompanyInterface;
use App\Interfaces\DestinationImagesInterface;
use App\Interfaces\DestinationInterface;
use App\Interfaces\GuestInterface;
use App\Interfaces\RatingsInterface;
use App\Interfaces\TestemonialsInterface;
use App\Repositories\Company\CompanyRepository;
use App\Repositories\Destinations\DestinationImagesRepository;
use App\Repositories\Destinations\DestinationRepository;
use App\Repositories\Guests\GuestRepository;
use App\Repositories\Ratings\RatingsRepository;
use App\Repositories\Testemonials\TestemonialsRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    private array $register = [
        DestinationInterface::class => DestinationRepository::class,
        DestinationImagesInterface::class => DestinationImagesRepository::class,
        GuestInterface::class => GuestRepository::class,
        RatingsInterface::class => RatingsRepository::class,
        TestemonialsInterface::class => TestemonialsRepository::class,
        CompanyInterface::class => CompanyRepository::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach ($this->register as $index => $value)
            $this->app->bind($index, $value);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}