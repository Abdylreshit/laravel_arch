<?php

namespace App\Containers\WarehouseSection\Warehouse\Tasks;

use App\Containers\WarehouseSection\Warehouse\Models\Warehouse;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;

class CreateWarehouseTask extends Task
{
    public function execute(array $data)
    {
        try {
            $warehouse = Warehouse::create([
                'name' => $data['name'],
                'is_blocked' => $data['is_blocked'] ?? false,
            ]);
        } catch (\Exception $e) {
            throw new ResourceException(['message' => $e->getMessage()]);
        }

        return $warehouse;
    }
}
