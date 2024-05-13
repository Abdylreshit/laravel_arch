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
                    ->clearMediaCollection()
                    ->addMediaFromUrl($file)
                    ->toMediaCollection('default', 'category_image');

                return $category;
            }

            $category
                ->clearMediaCollection()
                ->addMedia($file)
                ->toMediaCollection('default', 'category_image');

            return $category;
        } catch (\Exception $e) {
            throw new ResourceException(['message' => $e->getMessage()]);
        }
    }
}
