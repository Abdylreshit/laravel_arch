<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\UI\API\Controllers;

use App\Containers\WarehouseSection\MeasurementUnit\Actions\MeasurementCreateAction;
use App\Containers\WarehouseSection\MeasurementUnit\UI\API\Requests\MeasurementCreateRequest;
use App\Containers\WarehouseSection\MeasurementUnit\UI\API\Resources\MainMeasurementResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class MeasurementCreateController extends ApiController
{
    public function __invoke(MeasurementCreateRequest $request): JsonResponse
    {
        $measurementUnit = MeasurementCreateAction::run(
            [
                'name' => [
                    'en' => $request->input('name.en'),
                    'ru' => $request->input('name.ru'),
                ],
                'description' => [
                    'en' => $request->input('description.en') ?? null,
                    'ru' => $request->input('description.ru') ?? null,
                ],
            ]
        );

        return $this->successResponse([
            'measurement' => new MainMeasurementResource($measurementUnit),
        ]);
    }
}
