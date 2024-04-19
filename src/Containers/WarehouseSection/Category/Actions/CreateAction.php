<?php

namespace App\Containers\WarehouseSection\Category\Actions;

use App\Containers\WarehouseSection\Category\Tasks\CreateCategoryTask;
use App\Ship\Core\Abstracts\Actions\Action;

class CreateAction extends Action
{
    public function handle(array $data)
    {
        $category = app(CreateCategoryTask::class)->execute([
            'name' => $data['name'],
            'description' => $data['description'],
            'priority' => $data['priority'] ?? 0,
            'parent_id' => $data['parent_id'] ?? null,
        ]);

//        if ($data['has']('image') && config('category.image')) {
//            app(AttachCategoryImageTask::class)
//                ->execute($category, $data['file']('image'));
//        }

        return $category;
    }
}
