<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\UI\API\Controllers;

use App\Containers\WarehouseSection\MeasurementUnit\Actions\MeasurementUnitCreateAction;
use App\Containers\WarehouseSection\MeasurementUnit\UI\API\Requests\MeasurementCreateRequest;
use App\Containers\WarehouseSection\MeasurementUnit\UI\API\Resources\MeasurementUnitMainResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class MeasurementUnitCreateController extends ApiController
{
    public function __invoke(MeasurementCreateRequest $request): JsonResponse
    {
        $measurementUnit = MeasurementUnitCreateAction::run(
            [
                'name' => $request->name,
                'description' => $request->description,
                'symbol' => $request->symbol,
                'measurement_id' => $request->measurementId,
            ]
        );

        return $this->successResponse([
            'measurement_unit' => new MeasurementUnitMainResource($measurementUnit),
        ]);
    }
}
