<?php

namespace App\Containers\WarehouseSection\Product\Tasks;

use App\Containers\WarehouseSection\Stock\Models\StockPurchaseItem;
use App\Ship\Core\Abstracts\Tasks\Task;

class CreateStockPurchaseItemTask extends Task
{
    public function execute(array $data)
    {
        // Create a new stock purchase item
        $stockPurchaseItem = StockPurchaseItem::create([
            'stock_purchase_id' => $data['stock_purchase_id'],
            'stock_id' => $data['stock_id'],
            'quantity' => $data['quantity'],
            'purchase_price' => $data['purchase_price'],
            'purchase_price_currency_id' => $data['purchase_price_currency_id'],
        ]);

        return $stockPurchaseItem;
    }
}
