<?php

namespace App\Containers\WarehouseSection\Warehouse\Actions;

use App\Containers\WarehouseSection\Warehouse\Tasks\DeleteWarehouseByIdTask;
use App\Ship\Core\Abstracts\Actions\Action;

class DeleteAction extends Action
{
    public function handle($id): void
    {
        app(DeleteWarehouseByIdTask::class)->execute($id);
    }
}
