<?php

namespace App\Containers\WarehouseSection\Category\Data\Seeders;

use App\Containers\WarehouseSection\Category\Models\Category;
use App\Ship\Core\Abstracts\Seeders\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = Category::factory()->count(10)->create();

        $categories->each(function (Category $category) {
            Category::factory()->count(10)->create([
                'parent_id' => $category->id,
            ]);
        });

//        Category::factory()->count(50)->create();
    }
}
