<?php

namespace App\Containers\WarehouseSection\Price\Tasks;

use App\Containers\WarehouseSection\Price\Models\CurrencyConversion;
use App\Ship\Core\Abstracts\Tasks\Task;

class RestoreCurrencyConversionByIdTask extends Task
{
    public function execute($id)
    {
        $currencyConversion = CurrencyConversion::withTrashed()
            ->findOrFail($id);

        if ($currencyConversion->trashed()) {
            $currencyConversion->restore();
        }

        return $currencyConversion;
    }
}
