<?php

namespace App\Containers\WarehouseSection\EAV\Tasks;

use App\Containers\WarehouseSection\EAV\Models\PropertyValue;
use App\Ship\Core\Abstracts\Tasks\Task;

class FindPropertyValueByIdTask extends Task
{
    public function execute($id)
    {
        $propertyValue = PropertyValue::query()
            ->findOrFail($id);

        return $propertyValue;
    }
}
