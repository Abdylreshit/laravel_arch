<?php

namespace App\Containers\WarehouseSection\Supplier\UI\API\Controllers;

use App\Containers\WarehouseSection\Supplier\Actions\ListAction;
use App\Containers\WarehouseSection\Supplier\UI\API\Resources\ListResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class ListController extends ApiController
{
    /**
     * @LRDparam search nullable|string
     * @LRDparam sort nullable|string|in:id,name,phone,email,created_at
     * @LRDparam limit nullable|integer
     * @LRDparam page nullable|integer
     */
    public function __invoke(Request $request): JsonResponse
    {
        $request->validate([
            'search' => 'nullable|string',
            'sort' => 'nullable|string|in:id,name,created_at',
            'limit' => 'nullable|integer',
            'page' => 'nullable|integer',
        ]);

        $suppliers = ListAction::run($request->only(['search', 'sort', 'limit', 'page']));

        return $this->successResponse([
            'suppliers' => new ListResource($suppliers),
        ]);
    }
}
