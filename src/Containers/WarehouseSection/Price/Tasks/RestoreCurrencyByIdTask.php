<?php

namespace App\Containers\WarehouseSection\Price\Tasks;

use App\Containers\WarehouseSection\Price\Models\Currency;
use App\Ship\Core\Abstracts\Tasks\Task;

class RestoreCurrencyByIdTask extends Task
{
    public function execute($id)
    {
        $currency = Currency::withTrashed()
            ->findOrFail($id);

        if ($currency->trashed()) {
            $currency->restore();
        }

        return $currency;
    }
}
