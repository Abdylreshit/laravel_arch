<?php

namespace App\Containers\WarehouseSection\Category\Actions;

use App\Containers\WarehouseSection\Category\Tasks\AttachCategoryImageTask;
use App\Containers\WarehouseSection\Category\Tasks\EditByIdCategoryTask;
use App\Ship\Core\Abstracts\Actions\Action;

class UpdateAction extends Action
{
    public function handle(array $data)
    {
        $category = app(EditByIdCategoryTask::class)
            ->execute(
                $data['id'],
                [
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'priority' => $data['priority'] ?? 0,
                    'parent_id' => $data['parent_id'] ?? null,
                ]
            );

        //        if ($request->hasFile('image') && config('category.image')) {
        //            app(AttachCategoryImageTask::class)
        //                ->execute($category, $request->file('image'));
        //        }

        return $category;
    }
}
