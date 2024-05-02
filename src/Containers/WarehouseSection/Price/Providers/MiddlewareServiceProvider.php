<?php

namespace App\Containers\WarehouseSection\Price\Providers;

use App\Containers\WarehouseSection\Price\Middlewares\SetCurrency;
use App\Ship\Core\Abstracts\Providers\MiddlewareServiceProvider as ParentMiddlewareServiceProvider;

class MiddlewareServiceProvider extends ParentMiddlewareServiceProvider
{
    protected array $middlewares = [
        SetCurrency::class,
    ];
}
