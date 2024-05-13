<?php

namespace App\Containers\WarehouseSection\Supplier\Tasks;

use App\Containers\WarehouseSection\Supplier\Models\Supplier;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;

class CreateSupplierTask extends Task
{
    public function execute(array $data)
    {
        try {
            $supplier = Supplier::query()
                ->create([
                    'name' => $data['name'],
                    'email' => $data['email'] ?? null,
                    'phone' => $data['phone'] ?? null,
                    'note' => $data['note'] ?? null,
                ]);
        } catch (\Exception $e) {
            throw new ResourceException(['message' => $e->getMessage()]);
        }

        return $supplier;
    }
}
