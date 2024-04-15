<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Actions;

use App\Containers\WarehouseSection\MeasurementUnit\Tasks\EditByIdMeasurementUnitTask;
use App\Containers\WarehouseSection\MeasurementUnit\UI\API\Requests\UpdateRequest;
use App\Ship\Core\Abstracts\Actions\Action;

class UpdateAction extends Action
{
    public function handle(UpdateRequest $request)
    {
        return app(EditByIdMeasurementUnitTask::class)
            ->execute(
                $request->id,
                $request->only(
                    [
                        'name',
                        'description',
                        'type',
                        'symbol',
                        'conversion_factor_to_base_unit',
                    ]
                )
            );
    }
}
