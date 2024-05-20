<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\UI\API\Controllers;

use App\Containers\WarehouseSection\MeasurementUnit\Actions\UpdateAction;
use App\Containers\WarehouseSection\MeasurementUnit\UI\API\Requests\MeasurementUpdateRequest;
use App\Containers\WarehouseSection\MeasurementUnit\UI\API\Resources\MeasurementUnitMainResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class MeasurementUnitUpdateController extends ApiController
{
    public function __invoke(MeasurementUpdateRequest $request): JsonResponse
    {
        $measurementUnit = UpdateAction::run($request);

        return $this->successResponse([
            'measurement_unit' => new MeasurementUnitMainResource($measurementUnit),
        ]);
    }
}
