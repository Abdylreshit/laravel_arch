<?php

namespace App\Containers\WarehouseSection\EAV\Tasks;

use App\Containers\WarehouseSection\EAV\Models\Property;
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
