<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\UI\API\Controllers;

use App\Containers\WarehouseSection\MeasurementUnit\Actions\FindAction;
use App\Containers\WarehouseSection\MeasurementUnit\UI\API\Resources\MeasurementUnitMainResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class MeasurementFindController extends ApiController
{
    public function __invoke(Request $request): JsonResponse
    {
        $measurementUnit = FindAction::run($request->id);

        return $this->successResponse([
            'measurement_unit' => new MeasurementUnitMainResource($measurementUnit),
        ]);
    }
}
