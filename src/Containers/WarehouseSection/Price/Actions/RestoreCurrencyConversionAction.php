<?php

namespace App\Containers\WarehouseSection\Price\Actions;

use App\Containers\WarehouseSection\Price\Tasks\RestoreCurrencyByIdTask;
use App\Ship\Core\Abstracts\Actions\Action;

class RestoreCurrencyConversionAction extends Action
{
    public function handle($id)
    {
        $currencyConversion = app(RestoreCurrencyByIdTask::class)->execute($id);

        return $currencyConversion;
    }
}
