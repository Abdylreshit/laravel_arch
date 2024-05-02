<?php

namespace App\Containers\WarehouseSection\Supplier\Actions;

use App\Containers\WarehouseSection\Supplier\Tasks\RestoreSupplierByIdTask;
use App\Ship\Core\Abstracts\Actions\Action;

class RestoreAction extends Action
{
    public function handle($id)
    {
        $supplier = app(RestoreSupplierByIdTask::class)->execute($id);

        return $supplier;
    }
}
