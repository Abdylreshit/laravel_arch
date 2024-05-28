<?php

namespace App\Containers\WarehouseSection\Product\UI\API\Controllers;

use App\Containers\WarehouseSection\Product\Actions\ProductFindAction;
use App\Containers\WarehouseSection\Product\UI\API\Resources\MainProductResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class ProductFindController extends ApiController
{
    public function __invoke(Request $request): JsonResponse
    {
        $product = ProductFindAction::run($request->id);

        return $this->successResponse([
            'product' => new MainProductResource($product),
        ]);
    }
}
