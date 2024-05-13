<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Tasks;

use App\Containers\WarehouseSection\MeasurementUnit\Models\Measurement;
use App\Ship\Core\Abstracts\Tasks\Task;

class DeleteByIdMeasurementTask extends Task
{
    public function execute($id): void
    {
        $measurement = Measurement::query()->findOrFail($id);
        $measurement->delete();
    }
}
