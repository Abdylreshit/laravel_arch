<?php

namespace App\Containers\WarehouseSection\Product\Actions;

use App\Containers\WarehouseSection\Product\Tasks\DeletePropertyValueByIdTask;
use App\Ship\Core\Abstracts\Actions\Action;

class DeletePropertyValueAction extends Action
{
    public function handle($id)
    {
        app(DeletePropertyValueByIdTask::class)->execute($id);
    }
}
