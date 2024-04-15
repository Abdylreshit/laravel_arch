<?php

namespace App\Containers\WarehouseSection\Category\Tasks;

use App\Containers\WarehouseSection\Category\Models\Category;
use App\Ship\Core\Abstracts\Tasks\Task;

class DeleteByIdCategoryTask extends Task
{
    public function execute($id): void
    {
        $category = Category::query()->findOrFail($id);
        $category->delete();
    }
}
