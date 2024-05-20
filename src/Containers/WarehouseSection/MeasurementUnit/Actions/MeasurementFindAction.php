<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Actions;

use App\Containers\WarehouseSection\MeasurementUnit\Tasks\FindByIdMeasurementTask;
use App\Ship\Core\Abstracts\Actions\Action;

class MeasurementFindAction extends Action
{
    public function handle($id)
    {
        return app(FindByIdMeasurementTask::class)->execute($id);
    }
}
