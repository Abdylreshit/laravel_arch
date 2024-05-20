<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Actions;

use App\Containers\WarehouseSection\MeasurementUnit\Tasks\DeleteByIdMeasurementTask;
use App\Ship\Core\Abstracts\Actions\Action;

class MeasurementDeleteAction extends Action
{
    public function handle($id): void
    {
        app(DeleteByIdMeasurementTask::class)->execute($id);
    }
}
