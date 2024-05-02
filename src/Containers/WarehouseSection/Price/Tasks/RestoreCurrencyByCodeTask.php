<?php

namespace App\Containers\WarehouseSection\Price\Tasks;

use App\Containers\WarehouseSection\Price\Models\Currency;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;

class RestoreCurrencyByCodeTask extends Task
{
    public function execute($code, array $data)
    {
        $currency = Currency::withTrashed()
            ->where('code', $code)
            ->firstOrFail();

        if ($currency->trashed()) {
            $currency->restore();
        }

        return $currency;
    }
}
