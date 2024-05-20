<?php

namespace App\Containers\WarehouseSection\Price\Actions;

use App\Containers\WarehouseSection\Price\Tasks\RestoreCurrencyConversionByIdTask;
use App\Ship\Core\Abstracts\Actions\Action;

class RestoreCurrencyConversionAction extends Action
{
    public function handle($id)
    {
        $currencyConversion = app(RestoreCurrencyConversionByIdTask::class)->execute($id);

        return $currencyConversion;
    }
}
