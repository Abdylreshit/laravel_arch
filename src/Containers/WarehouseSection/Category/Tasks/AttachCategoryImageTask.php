<?php

namespace App\Containers\WarehouseSection\Category\Tasks;

use App\Containers\WarehouseSection\Category\Models\Category;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;

class AttachCategoryImageTask extends Task
{
    public function execute(Category $category, $file): Category
    {
        try {
            $category->addMedia($file)
                ->toMediaCollection('category_image');
        } catch (\Exception $e) {
            throw new ResourceException;
        }

        return $category;
    }
}
