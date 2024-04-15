<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Actions;

use App\Containers\WarehouseSection\MeasurementUnit\Tasks\CreateMeasurementUnitTask;
use App\Containers\WarehouseSection\MeasurementUnit\UI\API\Requests\CreateRequest;
use App\Ship\Core\Abstracts\Actions\Action;

class CreateAction extends Action
{
    public function handle(CreateRequest $request)
    {
        return app(CreateMeasurementUnitTask::class)->execute([
            'name' => $request->name,
            'description' => $request->description,
            'type' => $request->type,
            'symbol' => $request->symbol,
            'conversion_factor_to_base_unit' => $request->conversion_factor_to_base_unit,
        ]);
    }
}
