<?php

namespace App\Containers\WarehouseSection\Managers\Tasks;

use App\Containers\WarehouseSection\Category\Models\Category;
use App\Containers\WarehouseSection\Warehouse\Models\Warehouse;
use App\Ship\Core\Abstracts\Tasks\Task;

class AssociateWarehouseToCategory extends Task
{
    public function execute(Warehouse $warehouse, Category $category)
    {
        $category->warehouse()->associate($warehouse);
        $category->save();
        $category->refresh();

        return $category;
    }
}
