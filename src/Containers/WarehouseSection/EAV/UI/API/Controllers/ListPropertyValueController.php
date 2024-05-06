<?php

namespace App\Containers\WarehouseSection\EAV\UI\API\Controllers;

use App\Containers\WarehouseSection\EAV\Actions\ListPropertyValueAction;
use App\Containers\WarehouseSection\EAV\UI\API\Resources\ListPropertyValueResource;
use Illuminate\Http\Request;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class ListPropertyValueController extends ApiController
{
    /**
     * @LRDparam property_id nullable|integer
     * @LRDparam search nullable|string
     * @LRDparam sort nullable|string|in:id,created_at,'property_id'
     * @LRDparam limit nullable|integer
     * @LRDparam page nullable|integer
     */
    public function __invoke(Request $request): JsonResponse
    {
        $request->validate([
            'property_id' => 'nullable|integer',
            'search' => 'nullable|string',
            'sort' => 'nullable|string|in:id,created_at,property_id',
            'limit' => 'nullable|integer',
            'page' => 'nullable|integer',
        ]);

        $propertyValues = ListPropertyValueAction::run($request->only([
            'property_id','search', 'sort', 'limit', 'page'
        ]));

        return $this->successResponse([
            'property_values' => new ListPropertyValueResource($propertyValues),
        ]);
    }
}
