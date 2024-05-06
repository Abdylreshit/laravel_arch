<?php

namespace App\Containers\WarehouseSection\EAV\Actions;

use App\Containers\WarehouseSection\EAV\Tasks\RestorePropertyValueByIdTask;
use App\Ship\Core\Abstracts\Actions\Action;

class RestorePropertyValueAction extends Action
{
    public function handle($id)
    {
        app(RestorePropertyValueByIdTask::class)->execute($id);
    }
}
