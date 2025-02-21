<?php

namespace App\Containers\WarehouseSection\Product\Actions;

use App\Containers\WarehouseSection\Product\Tasks\FindProductByIdTask;
use App\Ship\Core\Abstracts\Actions\Action;

class ProductFindAction extends Action
{
    public function handle($id)
    {
        $product = app(FindProductByIdTask::class)->execute($id);

        return $product;
    }
}
