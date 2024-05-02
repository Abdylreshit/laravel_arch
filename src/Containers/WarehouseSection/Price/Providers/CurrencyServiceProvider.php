<?php

namespace App\Containers\WarehouseSection\Price\Providers;

use App\Containers\WarehouseSection\Price\Facades\CurrencyFacade;
use App\Containers\WarehouseSection\Price\Managers\CurrencyManager;
use App\Ship\Core\Abstracts\Providers\MainServiceProvider as ParentMainServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;

class CurrencyServiceProvider extends ParentMainServiceProvider implements DeferrableProvider
{
    public array $aliases = [
        'Currency' => CurrencyFacade::class,
    ];

    public function register(): void
    {
        parent::register();

        $this->app->singleton('currency', function () {
            return new CurrencyManager();
        });
    }
}
