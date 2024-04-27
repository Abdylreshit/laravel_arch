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
                    'en' => $data['name']['en'] ?? $category->translate('name', 'en'),
                    'ru' => $data['name']['ru'] ?? $category->translate('name', 'ru'),
                ],
                'description' => [
                    'en' => $data['description']['en'] ?? $category->translate('description', 'en'),
                    'ru' => $data['description']['ru'] ?? $category->translate('description', 'ru'),
                ],
                'priority' => $data['priority'] ? $data['priority'] : $category->priority,
                'parent_id' => $data['parent_id'] ? $data['parent_id'] : $category->parent_id,
            ]);
        } catch (\Exception) {
            throw new ResourceException;
        }

        return $category;
    }
}
