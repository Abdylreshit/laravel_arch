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
                    'en' => $data['name']['en'],
                    'ru' => $data['name']['ru'],
                ],
                'description' => [
                    'en' => $data['description']['en'],
                    'ru' => $data['description']['ru'],
                ],
                'priority' => $data['priority'] ?? 0,
                'parent_id' => $data['parent_id'] ?? null,
            ]);
        } catch (\Exception) {
            throw new ResourceException;
        }

        return $category;
    }
}
