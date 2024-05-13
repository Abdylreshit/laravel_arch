<?php

namespace App\Containers\WarehouseSection\Price\Actions;

use App\Containers\WarehouseSection\Price\Tasks\FindCurrencyByIdTask;
use App\Ship\Core\Abstracts\Actions\Action;

class FindCurrencyAction extends Action
{
    public function handle($id)
    {
        $currency = app(FindCurrencyByIdTask::class)->run($id);

        return $currency;
    }
}
