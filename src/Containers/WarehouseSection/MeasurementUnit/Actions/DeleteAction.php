<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Actions;

use App\Containers\WarehouseSection\MeasurementUnit\Tasks\DeleteByIdMeasurementUnitTask;
use App\Ship\Core\Abstracts\Actions\Action;

class DeleteAction extends Action
{
    public function handle($id): void
    {
        app(DeleteByIdMeasurementUnitTask::class)->execute($id);
    }
}
