<?php

namespace App\Containers\WarehouseSection\Price\Tasks;

use App\Containers\WarehouseSection\Price\Models\CurrencyConversion;
use App\Ship\Core\Abstracts\Tasks\Task;

class FindCurrencyConversionByIdTask extends Task
{
    public function execute($id)
    {
        $currencyConversion = CurrencyConversion::query()->findOrFail($id);

        return $currencyConversion;
    }
}
