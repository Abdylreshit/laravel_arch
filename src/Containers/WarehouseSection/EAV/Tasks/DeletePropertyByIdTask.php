<?php

namespace App\Containers\WarehouseSection\EAV\Tasks;

use App\Containers\WarehouseSection\EAV\Models\Property;
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
