<?php

namespace App\Containers\WarehouseSection\Product\Actions;

use App\Containers\WarehouseSection\Product\Tasks\DeletePropertyByIdTask;
use App\Ship\Core\Abstracts\Actions\Action;

class DeletePropertyAction extends Action
{
    public function handle($id)
    {
        app(DeletePropertyByIdTask::class)->execute($id);
    }
}
