<?php

namespace App\Containers\WarehouseSection\Product\UI\API\Controllers;

use App\Containers\WarehouseSection\Product\Actions\ProductFindAction;
use App\Containers\WarehouseSection\Product\UI\API\Resources\ListProductResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use App\Ship\Core\Resources\EnumResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class ProductFindController extends ApiController
{
    public function __invoke(Request $request): JsonResponse
    {
        $product = ProductFindAction::run($request->id);

        return $this->successResponse([
            'product' => [

            ],
        ]);
    }
}
