<?php

namespace App\Containers\WarehouseSection\Price\Tasks;

use App\Containers\WarehouseSection\Price\Models\Currency;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;

class DeleteCurrencyByIdTask extends Task
{
    public function execute($id, array $data)
    {
        $currency = Currency::query()->findOrFail($id);

        $currency->delete();
    }
}
