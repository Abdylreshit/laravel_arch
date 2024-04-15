<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Actions;

use App\Containers\WarehouseSection\MeasurementUnit\Models\MeasurementUnit;
use App\Containers\WarehouseSection\MeasurementUnit\Tasks\FindByIdMeasurementUnitTask;
use App\Ship\Core\Abstracts\Actions\Action;

class FindAction extends Action
{
    public function handle($id): MeasurementUnit
    {
        return app(FindByIdMeasurementUnitTask::class)->execute($id);
    }
}
