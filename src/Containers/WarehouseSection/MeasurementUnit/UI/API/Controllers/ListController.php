<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\UI\API\Controllers;

use App\Containers\WarehouseSection\MeasurementUnit\Actions\ListAction;
use App\Containers\WarehouseSection\MeasurementUnit\UI\API\Resources\ListResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class ListController extends ApiController
{
    /**
     * @LRDparam search nullable|string
     * @LRDparam sort nullable|string|in:id,code,created_at
     * @LRDparam limit nullable|integer
     * @LRDparam page nullable|integer
     */
    public function __invoke(Request $request): JsonResponse
    {
        $request->validate([
            'search' => 'nullable|string',
            'sort' => 'nullable|string|in:id,code,created_at',
            'limit' => 'nullable|integer',
            'page' => 'nullable|integer',
        ]);

        $measurementUnits = ListAction::run($request->only(['search', 'sort', 'limit', 'page']));

        return $this->successResponse([
            'measurement_units' => ListResource::collection($measurementUnits),
        ]);
    }
}
