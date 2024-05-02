<?php

namespace App\Containers\WarehouseSection\Product\Actions;

use App\Containers\WarehouseSection\Product\Tasks\RestorePropertyByIdTask;
use App\Ship\Core\Abstracts\Actions\Action;

class RestorePropertyAction extends Action
{
    public function handle($id)
    {
        app(RestorePropertyByIdTask::class)->execute($id);
    }
}
