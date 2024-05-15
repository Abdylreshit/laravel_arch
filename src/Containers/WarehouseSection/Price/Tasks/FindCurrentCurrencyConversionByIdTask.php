<?php

namespace App\Containers\WarehouseSection\Price\Tasks;

use App\Containers\WarehouseSection\Price\Models\Currency;
use App\Ship\Core\Abstracts\Tasks\Task;

class FindCurrentCurrencyConversionByIdTask extends Task
{
    public function execute($currencyId)
    {
        $currency = Currency::query()
            ->findOrFail($currencyId);

        $currencyConversion = $currency->actualConversion();

        return $currencyConversion;
    }
}
