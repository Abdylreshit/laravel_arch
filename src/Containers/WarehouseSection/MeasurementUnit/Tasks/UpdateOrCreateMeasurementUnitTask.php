<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Tasks;

use App\Containers\WarehouseSection\MeasurementUnit\Models\MeasurementUnit;
use App\Ship\Core\Abstracts\Tasks\Task;

class UpdateOrCreateMeasurementUnitTask extends Task
{
    public function execute(array $keys, array $data): void
    {
        MeasurementUnit::query()->updateOrCreate($keys, $data);
    }
}
