<?php

namespace App\Containers\WarehouseSection\EAV\Actions;

use App\Containers\WarehouseSection\EAV\Tasks\RestorePropertyByIdTask;
use App\Ship\Core\Abstracts\Actions\Action;

class RestorePropertyAction extends Action
{
    public function handle($id)
    {
        app(RestorePropertyByIdTask::class)->execute($id);
    }
}
