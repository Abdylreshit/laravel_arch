<?php

namespace App\Containers\WarehouseSection\Product\UI\API\Controllers;

use App\Containers\WarehouseSection\Product\Actions\ProductStockAction;
use App\Containers\WarehouseSection\Product\UI\API\Resources\MainProductResource;
use App\Containers\WarehouseSection\Warehouse\UI\API\Resources\MainResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class ProductStockController extends ApiController
{
    public function __invoke(Request $request): JsonResponse
    {
        $stocks = ProductStockAction::run($request->id);

        return $this->successResponse([
            'product' => new MainProductResource($stocks->first()->product),
            'stocks' => $stocks->map(function ($stock){
                return [
                    "warehouse" => new MainResource($stock->warehouse),
                    "id" => $stock->id,
                    "product_id" => $stock->inventory_id,
                    "quantity" => $stock->quantity,
                    "on_hand" => $stock->on_hand,
                    "on_reserve" => $stock->on_reserve,
                ];
            })
        ]);
    }
}
