<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\UI\API\Controllers;

use App\Containers\WarehouseSection\MeasurementUnit\Actions\MeasurementFindAction;
use App\Containers\WarehouseSection\MeasurementUnit\UI\API\Resources\MainMeasurementResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class MeasurementFindController extends ApiController
{
    public function __invoke(Request $request): JsonResponse
    {
        $measurement = MeasurementFindAction::run($request->id);

        return $this->successResponse([
            'measurement' => new MainMeasurementResource($measurement),
        ]);
    }
}
