<?php

namespace App\Containers\WarehouseSection\Product\Tasks;

use App\Containers\WarehouseSection\Product\Models\PropertyValue;
use App\Ship\Core\Abstracts\Tasks\Task;

class DeletePropertyValueByIdTask extends Task
{
    public function execute($id)
    {
        $propertyValue = PropertyValue::query()
            ->findOrFail($id);

        $propertyValue->delete();
    }
}
