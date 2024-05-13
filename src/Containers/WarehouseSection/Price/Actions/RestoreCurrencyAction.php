<?php

namespace App\Containers\WarehouseSection\Price\Actions;

use App\Containers\WarehouseSection\Price\Tasks\RestoreCurrencyByIdTask;
use App\Ship\Core\Abstracts\Actions\Action;

class RestoreCurrencyAction extends Action
{
    public function handle($id)
    {
        $currency = app(RestoreCurrencyByIdTask::class)->run($id);

        return $currency;
    }
}
