<?php

namespace App\Containers\WarehouseSection\Product\Tasks;

use App\Containers\WarehouseSection\Product\Models\Product;
use App\Ship\Core\Abstracts\Tasks\Task;

class DeleteProductByIdTask extends Task
{
    public function execute($id)
    {
        $product = Product::query()
            ->findOrFail($id);

        $product->delete();
    }
}
