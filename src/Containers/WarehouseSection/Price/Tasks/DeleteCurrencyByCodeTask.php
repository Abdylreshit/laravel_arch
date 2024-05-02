<?php

namespace App\Containers\WarehouseSection\Price\Tasks;

use App\Containers\WarehouseSection\Price\Models\Currency;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;

class DeleteCurrencyByCodeTask extends Task
{
    public function execute($code, array $data)
    {
        $currency = Currency::query()
            ->where('code', $code)
            ->firstOrFail();

        $currency->delete();
    }
}
