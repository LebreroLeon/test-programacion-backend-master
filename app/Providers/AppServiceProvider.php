<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Hoyvoy\Currencies\Domain\CurrencyRepositoryInterface;
use Hoyvoy\Currencies\Infrastructure\JsonCurrencyRepository;
use Hoyvoy\Currencies\Infrastructure\EloquentCurrencyRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CurrencyRepositoryInterface::class, EloquentCurrencyRepository::class);
        $this->app->bind(CurrencyRepositoryInterface::class, JsonCurrencyRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
