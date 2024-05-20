<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\UI\API\Controllers;

use App\Containers\WarehouseSection\MeasurementUnit\Actions\MeasurementCreateAction;
use App\Containers\WarehouseSection\MeasurementUnit\UI\API\Requests\MeasurementCreateRequest;
use App\Containers\WarehouseSection\MeasurementUnit\UI\API\Resources\MeasurementUnitMainResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class MeasurementCreateController extends ApiController
{
    public function __invoke(MeasurementCreateRequest $request): JsonResponse
    {
        $measurementUnit = MeasurementCreateAction::run(
            [
                'name' => $request->name,
                'description' => $request->description,
            ]
        );

        return $this->successResponse([
            'measurement_unit' => new MeasurementUnitMainResource($measurementUnit),
        ]);
    }
}
