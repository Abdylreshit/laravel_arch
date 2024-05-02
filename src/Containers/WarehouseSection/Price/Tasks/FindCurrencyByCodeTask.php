<?php

namespace App\Containers\WarehouseSection\Price\Tasks;

use App\Containers\WarehouseSection\Price\Models\Currency;
use App\Ship\Core\Abstracts\Tasks\Task;

class FindCurrencyByCodeTask extends Task
{
    public function execute($code)
    {
        $currency = Currency::query()
            ->where('code', $code)
            ->firstOrFail();

        return $currency;
    }
}
