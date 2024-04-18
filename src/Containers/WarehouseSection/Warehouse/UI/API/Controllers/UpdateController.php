<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\UI\API\Controllers;

use App\Containers\WarehouseSection\MeasurementUnit\Actions\UpdateAction;
use App\Containers\WarehouseSection\MeasurementUnit\UI\API\Requests\UpdateRequest;
use App\Containers\WarehouseSection\MeasurementUnit\UI\API\Resources\MainResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class UpdateController extends ApiController
{
    public function __invoke(UpdateRequest $request): JsonResponse
    {
        $measurementUnit = UpdateAction::run($request);

        return $this->successResponse([
            'measurement_unit' => new MainResource($measurementUnit),
        ]);
    }
}
