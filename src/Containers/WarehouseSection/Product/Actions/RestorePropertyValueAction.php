<?php

namespace App\Containers\WarehouseSection\Product\Actions;

use App\Containers\WarehouseSection\Product\Tasks\RestorePropertyValueByIdTask;
use App\Ship\Core\Abstracts\Actions\Action;

class RestorePropertyValueAction extends Action
{
    public function handle($id)
    {
        app(RestorePropertyValueByIdTask::class)->execute($id);
    }
}
