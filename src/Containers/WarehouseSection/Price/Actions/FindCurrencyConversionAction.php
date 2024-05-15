<?php

namespace App\Containers\WarehouseSection\Price\Actions;

use App\Containers\WarehouseSection\Price\Tasks\FindCurrencyConversionByIdTask;
use App\Ship\Core\Abstracts\Actions\Action;

class FindCurrencyConversionAction extends Action
{
    public function handle($id)
    {
        $currencyConversion = app(FindCurrencyConversionByIdTask::class)->run($id);

        return $currencyConversion;
    }
}
