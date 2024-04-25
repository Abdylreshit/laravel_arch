<?php

namespace App\Containers\WarehouseSection\Product\Tasks;

use App\Containers\WarehouseSection\Product\Models\Property;
use App\Ship\Core\Abstracts\Tasks\Task;

class DeletePropertyByIdTask extends Task
{
    public function execute($id)
    {
        $property = Property::query()
            ->findOrFail($id);

        $property->delete();
    }
}
