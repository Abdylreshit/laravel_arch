<?php

namespace App\Containers\WarehouseSection\Supplier\Actions;

use App\Containers\WarehouseSection\Supplier\Tasks\FindSupplierByIdTask;
use App\Ship\Core\Abstracts\Actions\Action;

class FindAction extends Action
{
    public function handle($id)
    {
        $supplier = app(FindSupplierByIdTask::class)->execute($id);

        return $supplier;
    }
}
