<?php

namespace App\Containers\WarehouseSection\Price\Actions;

use App\Containers\WarehouseSection\Price\Tasks\FindCurrentCurrencyConversionByIdTask;
use App\Ship\Core\Abstracts\Actions\Action;

class FindCurrentCurrencyConversionAction extends Action
{
    public function handle($currencyId)
    {
        $currencyConversion = app(FindCurrentCurrencyConversionByIdTask::class)->execute($currencyId);

        return $currencyConversion;
    }
}
