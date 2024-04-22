<?php

namespace App\Containers\WarehouseSection\Category\Tasks;

use App\Containers\WarehouseSection\Category\Models\Category;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;
use Illuminate\Support\Str;

class AttachCategoryImageTask extends Task
{
    public function execute(Category $category, $file): Category
    {
        try {

            if (Str::isUrl($file)) {
                $category
                    ->clearMediaCollection('category_image')
                    ->addMediaFromUrl($file)
                    ->toMediaCollection('category_image');

                return $category;
            }

            $category
                ->clearMediaCollection('category_image')
                ->addMedia($file)
                ->toMediaCollection('category_image');

            return $category;
        } catch (\Exception $e) {
            throw new ResourceException;
        }
    }
}
