<?php

namespace App\Containers\WarehouseSection\Product\UI\API\Controllers;

use App\Containers\WarehouseSection\Product\Actions\ListPropertyAction;
use App\Containers\WarehouseSection\Product\UI\API\Resources\ListPropertyResource;
use Illuminate\Http\Request;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class ListPropertyController extends ApiController
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

        $properties = ListPropertyAction::run($request->only(['search', 'sort', 'limit', 'page']));

        return $this->successResponse([
            'properties' => new ListPropertyResource($properties),
        ]);
    }
}
