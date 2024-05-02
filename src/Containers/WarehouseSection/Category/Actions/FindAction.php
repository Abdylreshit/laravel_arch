<?php

namespace App\Containers\WarehouseSection\Category\Actions;

use App\Containers\WarehouseSection\Category\Tasks\FindByIdCategoryTask;
use App\Ship\Core\Abstracts\Actions\Action;

class FindAction extends Action
{
    public function handle($id)
    {
        $category = app(FindByIdCategoryTask::class)->execute($id);

        if (config('category.image')) {
            $category->load('image');
        }

        return $category;
    }
}
