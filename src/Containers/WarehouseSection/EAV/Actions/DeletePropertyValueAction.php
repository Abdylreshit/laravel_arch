<?php

namespace App\Containers\WarehouseSection\EAV\Actions;

use App\Containers\WarehouseSection\EAV\Tasks\DeletePropertyValueByIdTask;
use App\Ship\Core\Abstracts\Actions\Action;

class DeletePropertyValueAction extends Action
{
    public function handle($id)
    {
        app(DeletePropertyValueByIdTask::class)->execute($id);
    }
}
