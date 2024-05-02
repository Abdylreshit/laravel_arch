<?php

namespace App\Containers\WarehouseSection\Supplier\Actions;

use App\Containers\WarehouseSection\Supplier\Tasks\CreateSupplierTask;
use App\Ship\Core\Abstracts\Actions\Action;

class CreateAction extends Action
{
    public function handle(array $data)
    {
        $supplier = app(CreateSupplierTask::class)->execute([
            'name' => $data['name'],
            'email' => $data['email'] ?? null,
            'phone' => $data['phone'] ?? null,
            'note' => $data['note'] ?? null,
        ]);

        return $supplier;
    }
}
