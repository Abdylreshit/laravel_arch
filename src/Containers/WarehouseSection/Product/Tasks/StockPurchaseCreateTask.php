<?php

namespace App\Containers\WarehouseSection\Product\Tasks;

use App\Containers\WarehouseSection\Stock\Enums\StockPurchaseStateEnum;
use App\Containers\WarehouseSection\Stock\Models\StockPurchase;
use App\Ship\Core\Abstracts\Tasks\Task;

class StockPurchaseCreateTask extends Task
{
    public function execute(array $data)
    {
        // Create a new stock purchase
        $stockPurchase = StockPurchase::create([
            'created_by' => $data['created_by'],
            'supplier_id' => $data['supplier_id'] ?? null,
            'note' => $data['note'] ?? null,
            'state' => StockPurchaseStateEnum::DRAFT
        ]);

        return $stockPurchase;
    }
}
