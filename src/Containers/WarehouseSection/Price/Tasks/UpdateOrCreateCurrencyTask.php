<?php

namespace App\Containers\WarehouseSection\Price\Tasks;

use App\Containers\WarehouseSection\Price\Models\Currency;
use App\Ship\Core\Abstracts\Tasks\Task;

class UpdateOrCreateCurrencyTask extends Task
{
    public function execute(array $keys, array $data)
    {
        $currency = Currency::query()->updateOrCreate($keys, $data);

        return $currency;
    }
}
