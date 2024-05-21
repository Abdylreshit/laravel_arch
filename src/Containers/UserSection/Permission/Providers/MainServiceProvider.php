<?php

namespace App\Containers\UserSection\Permission\Providers;

use App\Ship\Core\Abstracts\Providers\MainServiceProvider as ParentMainServiceProvider;

class MainServiceProvider extends ParentMainServiceProvider
{
    public array $serviceProviders = [
        MiddlewareServiceProvider::class,
    ];

    public function register(): void
    {
        parent::register();
    }

    public function boot(): void
    {
        parent::boot();
    }
}
