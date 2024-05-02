<?php

namespace App\Containers\WarehouseSection\Supplier\Actions;

use App\Containers\WarehouseSection\Supplier\Tasks\DeleteSupplierByIdTask;
use App\Ship\Core\Abstracts\Actions\Action;

class DeleteAction extends Action
{
    public function handle($id)
    {
        app(DeleteSupplierByIdTask::class)->execute($id);
    }
}
