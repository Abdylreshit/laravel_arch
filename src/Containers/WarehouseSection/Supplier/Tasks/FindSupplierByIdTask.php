<?php

namespace App\Containers\WarehouseSection\Supplier\Tasks;

use App\Containers\WarehouseSection\Supplier\Models\Supplier;
use App\Ship\Core\Abstracts\Tasks\Task;

class FindSupplierByIdTask extends Task
{
    public function execute($id)
    {
        $supplier = Supplier::query()
            ->findOrFail($id);

        return $supplier;
    }
}
