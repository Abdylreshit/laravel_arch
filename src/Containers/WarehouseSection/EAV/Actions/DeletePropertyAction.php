<?php

namespace App\Containers\WarehouseSection\EAV\Actions;

use App\Containers\WarehouseSection\EAV\Tasks\DeletePropertyByIdTask;
use App\Ship\Core\Abstracts\Actions\Action;

class DeletePropertyAction extends Action
{
    public function handle($id)
    {
        app(DeletePropertyByIdTask::class)->execute($id);
    }
}
