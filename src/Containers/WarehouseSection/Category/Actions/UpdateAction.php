<?php

namespace App\Containers\WarehouseSection\Category\Actions;

use App\Containers\WarehouseSection\Category\Tasks\AttachCategoryImageTask;
use App\Containers\WarehouseSection\Category\Tasks\EditByIdCategoryTask;
use App\Containers\WarehouseSection\Category\UI\API\Requests\UpdateRequest;
use App\Ship\Core\Abstracts\Actions\Action;

class UpdateAction extends Action
{
    public function handle(UpdateRequest $request)
    {
        $category = app(EditByIdCategoryTask::class)
            ->execute(
                $request->id,
                $request->only(
                    [
                        'name',
                        'description',
                        'priority',
                        'parent_id'
                    ]
                )
            );

        if ($request->hasFile('image') && config('category.image')) {
            app(AttachCategoryImageTask::class)
                ->execute($category, $request->file('image'));
        }

        return $category;
    }
}
