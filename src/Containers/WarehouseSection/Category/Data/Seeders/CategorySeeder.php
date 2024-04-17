<?php

namespace App\Containers\WarehouseSection\Category\Data\Seeders;

use App\Containers\WarehouseSection\Category\Models\Category;
use App\Ship\Core\Abstracts\Seeders\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::factory()->count(50)->create();
    }
}
