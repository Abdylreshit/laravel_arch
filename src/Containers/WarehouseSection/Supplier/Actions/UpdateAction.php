<?php

namespace App\Containers\WarehouseSection\Supplier\Actions;

use App\Containers\WarehouseSection\Supplier\Tasks\EditSupplierByIdTask;
use App\Ship\Core\Abstracts\Actions\Action;

class UpdateAction extends Action
{
    public function handle(array $data)
    {
        $supplier = app(EditSupplierByIdTask::class)->execute(
            $data['id'],
            [
                'name' => $data['name'],
                'email' => $data['email'] ?? null,
                'phone' => $data['phone'] ?? null,
                'note' => $data['note'] ?? null,
            ]
        );

        return $supplier;
    }
}
