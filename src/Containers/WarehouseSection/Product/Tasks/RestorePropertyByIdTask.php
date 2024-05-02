<?php

namespace App\Containers\WarehouseSection\Product\Tasks;

use App\Containers\WarehouseSection\Product\Models\Property;
use App\Ship\Core\Abstracts\Tasks\Task;

class RestorePropertyByIdTask extends Task
{
    public function execute($id)
    {
        $property = Property::withTrashed()
            ->findOrFail($id);

        if ($property->trashed()) {
            $property->restore();
        }

        return $property;
    }
}
