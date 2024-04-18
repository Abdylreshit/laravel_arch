<?php

namespace App\Containers\WarehouseSection\Warehouse\Tasks;

use App\Containers\WarehouseSection\Warehouse\Models\Warehouse;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;

class EditWarehouseByIdTask extends Task
{
    public function execute($id, array $data)
    {
        $warehouse = Warehouse::query()->findOrFail($id);

        try {
            $warehouse->update([
                'name' => $data['name'],
                'is_blocked' => $data['is_blocked'] ?? false,
            ]);
        } catch (\Exception) {
            throw new ResourceException;
        }

        return $warehouse;
    }
}
