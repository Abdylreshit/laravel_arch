<?php

namespace App\Containers\WarehouseSection\Supplier\Tasks;

use App\Containers\WarehouseSection\Supplier\Models\Supplier;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;

class EditSupplierByIdTask extends Task
{
    public function execute($id, array $data)
    {
        $supplier = Supplier::query()
            ->findOrFail($id);

        try {
            $supplier->update([
                'name' => $data['name'] ?? $supplier->name,
                'email' => $data['email'] ?? $supplier->email,
                'phone' => $data['phone'] ?? $supplier->phone,
                'note' => $data['note'] ?? $supplier->note,
            ]);
        } catch (\Exception $e) {
            throw new ResourceException;
        }

        return $supplier;
    }
}
