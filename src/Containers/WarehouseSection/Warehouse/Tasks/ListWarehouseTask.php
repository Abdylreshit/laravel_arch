<?php

namespace App\Containers\WarehouseSection\Warehouse\Tasks;

use App\Containers\WarehouseSection\Warehouse\Models\Warehouse;
use App\Ship\Core\Abstracts\Tasks\Task;

class ListWarehouseTask extends Task
{
    public function execute()
    {
        return Warehouse::query()->get();
    }
}
