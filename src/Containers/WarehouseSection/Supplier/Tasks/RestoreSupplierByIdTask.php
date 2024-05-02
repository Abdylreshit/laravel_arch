<?php

namespace App\Containers\WarehouseSection\Supplier\Tasks;

use App\Containers\WarehouseSection\Supplier\Models\Supplier;
use App\Ship\Core\Abstracts\Tasks\Task;

class RestoreSupplierByIdTask extends Task
{
    public function execute($id)
    {
        $supplier = Supplier::withTrashed()
            ->findOrFail($id);

        if ($supplier->trashed()) {
            $supplier->restore();
        }

        return $supplier;
    }
}
