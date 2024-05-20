<?php

namespace App\Containers\WarehouseSection\Category\Tasks;

use App\Containers\WarehouseSection\Category\Models\Category;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;

class EditByIdCategoryTask extends Task
{
    public function execute($id, array $data)
    {
        $category = Category::query()->findOrFail($id);

        try {
            $category->update([
                'name' => [
                    'en' => $data['name']['en'] ?? $category->getTrans('name', 'en'),
                    'ru' => $data['name']['ru'] ?? $category->getTrans('name', 'ru'),
                ],
                'description' => [
                    'en' => $data['description']['en'] ?? $category->getTrans('description', 'en'),
                    'ru' => $data['description']['ru'] ?? $category->getTrans('description', 'ru'),
                ],
                'priority' => $data['priority'] ?? $category->priority,
                'parent_id' => $data['parent_id'] ?? $category->parent_id,
            ]);
        } catch (\Exception) {
            throw new ResourceException(['message' => $e->getMessage()]);
        }

        return $category;
    }
}
