<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\UI\API\Controllers;

use App\Containers\WarehouseSection\MeasurementUnit\Actions\CreateAction;
use App\Containers\WarehouseSection\MeasurementUnit\UI\API\Requests\CreateRequest;
use App\Containers\WarehouseSection\MeasurementUnit\UI\API\Resources\MainResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class CreateController extends ApiController
{
    public function __invoke(CreateRequest $request): JsonResponse
    {
        $measurementUnit = CreateAction::run($request);

        return $this->successResponse([
            'measurement_unit' => new MainResource($measurementUnit),
        ]);
    }
}
