<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Tasks;

use App\Containers\WarehouseSection\MeasurementUnit\Models\MeasurementUnit;
use App\Ship\Core\Abstracts\Tasks\Task;

class DeleteByIdMeasurementUnitTask extends Task
{
    public function execute($id): void
    {
        $measurementUnit = MeasurementUnit::query()->findOrFail($id);
        $measurementUnit->delete();
    }
}
