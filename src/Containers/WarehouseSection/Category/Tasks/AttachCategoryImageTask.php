<?php

namespace App\Containers\WarehouseSection\Category\Tasks;

use App\Containers\WarehouseSection\Category\Models\Category;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class AttachCategoryImageTask extends Task
{
    public function execute(Category $category, $file): Category
    {
        try {

            if (Str::isUrl($file)) {
                $category
                    ->clearMediaCollection('category_image')
                    ->addMediaFromUrl($file)
                    ->toMediaCollection('category_image')
                ;
                
                return $category;
            }

            if (UploadedFile::class === get_class($file)){
                $category->addMedia($file)
                    ->toMediaCollection('category_image');

                return $category;
            }

            throw new ResourceException;
        } catch (\Exception $e) {
            throw new ResourceException;
        }
    }
}
