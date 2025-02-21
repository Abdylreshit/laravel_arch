<?php

namespace App\Containers\WarehouseSection\Price\Tasks;

use App\Containers\WarehouseSection\Price\Models\Currency;
use App\Ship\Core\Abstracts\Tasks\Task;

class RestoreCurrencyByIdTask extends Task
{
    public function execute($id)
    {
        $currencyConversion = Currency::withTrashed()
            ->findOrFail($id);

        if ($currencyConversion->trashed()) {
            $currencyConversion->restore();
        }

        return $currencyConversion;
    }
}
