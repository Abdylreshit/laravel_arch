<?php

namespace App\Containers\WarehouseSection\Warehouse\Tasks;

use App\Containers\WarehouseSection\Warehouse\Models\Warehouse;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;

class RestoreWarehouseByIdTask extends Task
{
    public function execute($id)
    {
        $warehouse = Warehouse::withTrashed()->findOrFail($id);

        if ($warehouse->trashed()) {
            $warehouse->restore();
        } else {
            throw new ResourceException(['message' => $e->getMessage()]);
        }
    }
}
