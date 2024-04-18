<?php

namespace App\Containers\WarehouseSection\Warehouse\Actions;

use App\Containers\WarehouseSection\Warehouse\Models\Warehouse;
use App\Containers\WarehouseSection\Warehouse\Tasks\FindWarehouseByIdTask;
use App\Ship\Core\Abstracts\Actions\Action;

class FindAction extends Action
{
    public function handle($id): Warehouse
    {
        return app(FindWarehouseByIdTask::class)->execute($id);
    }
}
