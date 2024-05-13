<?php

namespace App\Containers\WarehouseSection\Price\Tasks;

use App\Containers\WarehouseSection\Price\Models\CurrencyConversion;
use App\Ship\Core\Abstracts\Tasks\Task;

class DeleteCurrencyConversionByIdTask extends Task
{
    public function execute($id)
    {
        $currencyConversion = CurrencyConversion::query()->findOrFail($id);

        $currencyConversion->delete();
    }
}
