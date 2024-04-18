<?php

namespace App\Containers\WarehouseSection\Warehouse\Tasks;

use App\Containers\WarehouseSection\Warehouse\Models\Warehouse;
use App\Ship\Core\Abstracts\Tasks\Task;

class DeleteWarehouseByIdTask extends Task
{
    public function execute($id): void
    {
        $warehouse = Warehouse::query()->findOrFail($id);
        $warehouse->delete();
    }
}
