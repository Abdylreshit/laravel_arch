<?php

namespace App\Containers\WarehouseSection\Price\Actions;

use App\Containers\WarehouseSection\Price\Tasks\DeleteCurrencyByIdTask;
use App\Ship\Core\Abstracts\Actions\Action;

class DeleteCurrencyAction extends Action
{
    public function handle($id)
    {
        app(DeleteCurrencyByIdTask::class)->execute($id);
    }
}
