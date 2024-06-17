<?php

namespace App\Containers\WarehouseSection\Product\UI\API\Controllers;

use App\Containers\WarehouseSection\Product\Actions\CreateProductStockPurchaseAction;
use App\Containers\WarehouseSection\Product\UI\API\Requests\CreateProductStockPurchaseRequest;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use App\Ship\Core\Resources\EnumResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class CreateProductStockPurchaseController extends ApiController
{
    public function __invoke(CreateProductStockPurchaseRequest $request): JsonResponse
    {
        $staff = currentStaff();

        $stockPurchase = CreateProductStockPurchaseAction::run([
            'created_by' => $staff->id,
            'supplier_id' => $request->supplier_id ?? null,
            'note' => $request->note ?? null,
            'items' => $request->items ?? []
        ]);

        return $this->successResponse([
            'stock_purchase' => [
                'id' => $stockPurchase->id,
                'created_by' => $stockPurchase->created_by,
                'state' => new EnumResource($stockPurchase->state),
                'items' => $stockPurchase->items->map(function ($item) {
                    return [
                        'id' => $item->id,
                        'stock_id' => $item->stock_id,
                        'quantity' => $item->quantity,
                        'purchase_price' => $item->purchase_price,
                        'purchase_price_currency_id' => $item->purchase_price_currency_id,
                        'state' => new EnumResource($item->state),
                    ];
                }),
            ],
        ]);
    }
}
