<?php

namespace App\Containers\StaffSection\Staff\Providers;

use App\Ship\Core\Abstracts\Providers\MainServiceProvider as ParentMainServiceProvider;

class MainServiceProvider extends ParentMainServiceProvider
{
    public array $serviceProviders = [
        // InternalServiceProviderExample::class,
    ];

    public array $aliases = [
        // 'Foo' => Bar::class,
    ];

    public function register(): void
    {
        parent::register();
    }
}
