<?php

namespace App\Containers\WarehouseSection\Category\Tasks;

use App\Containers\WarehouseSection\Category\Models\Category;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;

class MoveCategoryTask extends Task
{
    public function execute($id, array $data)
    {
        $category = Category::query()->findOrFail($id);

        try {
            $category->update([
                'parent_id' => $data['parent_id'] ?? $category->parent_id,
                'priority' => $data['priority'] ?? $category->priority,
            ]);
        } catch (\Exception) {
            throw new ResourceException(['message' => $e->getMessage()]);
        }

        return $category;
    }
}
