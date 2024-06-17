<?php

namespace App\Containers\WarehouseSection\Product\Actions;

use App\Containers\WarehouseSection\Product\Tasks\CreateStockPurchaseItemTask;
use App\Containers\WarehouseSection\Product\Tasks\StockPurchaseCreateTask;
use App\Ship\Core\Abstracts\Actions\Action;
use App\Ship\Exceptions\ResourceException;

class CreateProductStockPurchaseAction extends Action
{
    public function handle(array $data)
    {
        try {
            $stockPurchase = app(StockPurchaseCreateTask::class)->execute([
                'created_by' => $data['created_by'],
                'supplier_id' => $data['supplier_id'] ?? null,
                'note' => $data['note'] ?? null,
            ]);

            // Create stock purchase items
            foreach ($data['items'] as $item) {
                app(CreateStockPurchaseItemTask::class)->execute([
                    'stock_purchase_id' => $stockPurchase->id,
                    'stock_id' => $item['stock_id'],
                    'quantity' => $item['quantity'],
                    'purchase_price' => $item['purchase_price'],
                    'purchase_price_currency_id' => $item['purchase_price_currency_id'],
                ]);
            }

            return $stockPurchase;
        } catch (\Exception $e) {
            throw new ResourceException(['message' => $e->getMessage()]);
        }
    }
}
