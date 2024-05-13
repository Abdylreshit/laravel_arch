<?php

namespace App\Containers\WarehouseSection\Category\Tasks;

use App\Containers\WarehouseSection\Category\Models\Category;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;

class CreateCategoryTask extends Task
{
    public function execute(array $data)
    {
        try {
            $category = Category::create([
                'name' => [
                    'en' => $data['name']['en'],
                    'ru' => $data['name']['ru'],
                ],
                'description' => [
                    'en' => $data['description']['en'] ?? null,
                    'ru' => $data['description']['ru'] ?? null,
                ],
                'priority' => $data['priority'] ?? 0,
                'parent_id' => $data['parent_id'] ?? null,
            ]);
        } catch (\Exception $e) {
            throw new ResourceException(['message' => $e->getMessage()]);
        }

        return $category;
    }
}
