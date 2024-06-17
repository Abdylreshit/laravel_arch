<?php

namespace App\Containers\WarehouseSection\Product\Tasks;

use App\Containers\WarehouseSection\Product\Models\Product;
use App\Ship\Core\Abstracts\Tasks\Task;

class FindProductStockTask extends Task
{
    public function execute(Product $product)
    {
        $stocks = $product->stocks;

        $stocks->load('warehouse');
        $stocks->load('product');

        return $stocks;
    }
}
