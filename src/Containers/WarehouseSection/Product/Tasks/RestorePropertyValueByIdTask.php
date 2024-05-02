<?php

namespace App\Containers\WarehouseSection\Product\Tasks;

use App\Containers\WarehouseSection\Product\Models\PropertyValue;
use App\Ship\Core\Abstracts\Tasks\Task;

class RestorePropertyValueByIdTask extends Task
{
    public function execute($id)
    {
        $propertyValue = PropertyValue::withTrashed()
            ->findOrFail($id);

        if ($propertyValue->trashed()) {
            $propertyValue->restore();
        }

        return $propertyValue;
    }
}
