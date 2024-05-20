<?php

namespace App\Containers\WarehouseSection\Price\Actions;

use App\Containers\WarehouseSection\Price\Tasks\FindCurrentCurrencyConversionByIdTask;
use App\Ship\Core\Abstracts\Actions\Action;

class FindCurrentCurrencyConversionAction extends Action
{
    public function handle($conversionId)
    {
        $currencyConversion = app(FindCurrentCurrencyConversionByIdTask::class)->execute($conversionId);

        return $currencyConversion;
    }
}
