<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Tasks;

use App\Containers\WarehouseSection\MeasurementUnit\Models\Measurement;
use App\Ship\Core\Abstracts\Tasks\Task;

class FindByIdMeasurementTask extends Task
{
    public function execute($id)
    {
        return Measurement::query()->findOrFail($id);
    }
}
