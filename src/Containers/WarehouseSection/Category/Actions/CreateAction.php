<?php

namespace App\Containers\WarehouseSection\Category\Actions;

use App\Containers\WarehouseSection\Category\Tasks\AttachCategoryImageTask;
use App\Containers\WarehouseSection\Category\Tasks\CreateCategoryTask;
use App\Containers\WarehouseSection\Category\UI\API\Requests\CreateRequest;
use App\Ship\Core\Abstracts\Actions\Action;

class CreateAction extends Action
{
    public function handle(CreateRequest $request)
    {
        $category = app(CreateCategoryTask::class)->execute([
            'name' => $request->name,
            'description' => $request->description,
            'priority' => $request->priority,
            'parent_id' => $request->parent_id,
        ]);

        if ($request->has('image') && config('category.image')) {
            app(AttachCategoryImageTask::class)
                ->execute($category, $request->file('image'));
        }

        return $category;
    }
}
