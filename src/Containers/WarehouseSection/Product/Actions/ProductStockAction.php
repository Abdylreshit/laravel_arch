<?php

namespace App\Containers\WarehouseSection\Product\Actions;

use App\Containers\WarehouseSection\Product\Tasks\FindProductByIdTask;
use App\Containers\WarehouseSection\Product\Tasks\FindProductStockTask;
use App\Ship\Core\Abstracts\Actions\Action;

class ProductStockAction extends Action
{
    public function handle($id)
    {
        $product = app(FindProductByIdTask::class)->execute($id);

        $stock = app(FindProductStockTask::class)->execute($product);

        return $stock;
    }
}
