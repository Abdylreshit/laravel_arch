<?php

namespace App\Ship\Core\Abstracts\Providers;

use App\Ship\Core\Loaders\AliasesLoaderTrait;
use App\Ship\Core\Loaders\ProvidersLoaderTrait;
use Illuminate\Support\ServiceProvider as LaravelAppServiceProvider;

abstract class MainServiceProvider extends LaravelAppServiceProvider
{
    use AliasesLoaderTrait;
    use ProvidersLoaderTrait;

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->loadServiceProviders();
        $this->loadAliases();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
