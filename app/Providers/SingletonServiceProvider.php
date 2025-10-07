<?php

namespace App\Providers;

use App\Repositories\PartnerRepository;
use App\Repositories\ItemRepository;
use App\Services\ItemService;
use App\Services\SupplierService;
use Illuminate\Support\ServiceProvider;

class SingletonServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->registerRepositories();
        $this->registerServices();
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    private function registerRepositories() : void
    {
        $this->app->singleton(ItemRepository::class, function ($app) {
            return new ItemRepository();
        });
        $this->app->singleton(PartnerRepository::class, function ($app) {
            return new PartnerRepository();
        });
    }

    private function registerServices() : void
    {
        $this->app->singleton(ItemService::class, function ($app) {
            return new ItemService($app->make(ItemRepository::class));
        });
        $this->app->singleton(SupplierService::class, function ($app) {
            return new SupplierService($app->make(PartnerRepository::class));
        });
    }
}
