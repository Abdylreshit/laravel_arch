<?php

namespace App\Containers\WarehouseSection\Category\UI\API\Controllers;

use App\Containers\WarehouseSection\Category\Actions\ListAction;
use App\Containers\WarehouseSection\Category\UI\API\Resources\ListResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class ListController extends ApiController
{
    /**
     * @LRDparam search nullable|string
     * @LRDparam sort nullable|string|in:id,name,created_at
     */
    public function __invoke(Request $request): JsonResponse
    {
        $request->validate([
            'search' => 'nullable|string',
            'sort' => 'nullable|string|in:id,name,created_at',
            'limit' => 'nullable|integer',
            'page' => 'nullable|integer',
        ]);

        $categories = ListAction::run($request->only(['search', 'sort', 'limit','page']));

        return $this->successResponse([
            'categories' => new ListResource($categories),
        ]);
    }
}
