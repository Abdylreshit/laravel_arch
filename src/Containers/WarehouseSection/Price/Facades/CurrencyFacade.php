<?php

namespace App\Containers\WarehouseSection\Price\Facades;

use Illuminate\Support\Facades\Facade;

class CurrencyFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'currency';
    }
}
