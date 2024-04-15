<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Tasks;

use App\Containers\WarehouseSection\MeasurementUnit\Models\MeasurementUnit;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;

class EditByIdMeasurementUnitTask extends Task
{
    public function execute($id, array $data)
    {
        $measurementUnit = MeasurementUnit::query()->findOrFail($id);

        try {
            $measurementUnit->update($data);
        } catch (\Exception) {
            throw new ResourceException;
        }

        return $measurementUnit;
    }
}
