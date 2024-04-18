<?php

namespace App\Containers\WarehouseSection\Warehouse\Tasks;

use App\Containers\WarehouseSection\Warehouse\Models\Warehouse;
use App\Ship\Core\Abstracts\Tasks\Task;

class FindWarehouseByIdTask extends Task
{
    public function execute($id)
    {
        return Warehouse::query()->findOrFail($id);
    }
}
