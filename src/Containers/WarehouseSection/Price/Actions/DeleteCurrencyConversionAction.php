<?php

namespace App\Containers\WarehouseSection\Price\Actions;

use App\Containers\WarehouseSection\Price\Tasks\DeleteCurrencyConversionByIdTask;
use App\Ship\Core\Abstracts\Actions\Action;

class DeleteCurrencyConversionAction extends Action
{
    public function handle($id)
    {
        app(DeleteCurrencyConversionByIdTask::class)->execute($id);
    }
}
