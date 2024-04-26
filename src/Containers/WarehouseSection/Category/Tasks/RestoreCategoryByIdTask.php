<?php

namespace App\Containers\WarehouseSection\Category\Tasks;

use App\Containers\WarehouseSection\Category\Models\Category;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;

class RestoreCategoryByIdTask extends Task
{
    public function execute($id)
    {
        $category = Category::query()->findOrFail($id);

        if ($category->trashed()) {
            $category->restore();
        } else {
            throw new ResourceException('Category is not trashed');
        }
    }
}
