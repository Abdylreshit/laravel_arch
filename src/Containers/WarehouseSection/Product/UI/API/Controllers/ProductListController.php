<?php

namespace App\Containers\WarehouseSection\Product\UI\API\Controllers;

use App\Containers\WarehouseSection\Product\Actions\ProductListAction;
use App\Containers\WarehouseSection\Product\UI\API\Resources\ListProductResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class ProductListController extends ApiController
{
    /**
     * @LRDparam search nullable|string
     * @LRDparam sort nullable|string|in:id,created_at
     * @LRDparam limit nullable|integer
     * @LRDparam page nullable|integer
     */
    public function __invoke(Request $request): JsonResponse
    {
        $request->validate([
            'search' => 'nullable|string',
            'sort' => 'nullable|string|in:id,created_at',
            'limit' => 'nullable|integer',
            'page' => 'nullable|integer',
        ]);

        $products = ProductListAction::run($request->only(['search', 'sort', 'limit', 'page']));

        return $this->successResponse([
            'products' => new ListProductResource($products),
        ]);
    }
}
