<?php

namespace App\Containers\WarehouseSection\Managers\Data\Seeders;

use App\Containers\WarehouseSection\Category\Models\Category;
use App\Containers\WarehouseSection\Warehouse\Models\Warehouse;
use App\Ship\Core\Abstracts\Seeders\Seeder;

class WarehouseCategorySeeder extends Seeder
{
    public function run(): void
    {
        Warehouse::factory()->count(10)->has(
            Category::factory()
                ->has(Category::factory()->count(20), 'children')
                ->count(10), 'categories'
        )->create();
    }
}
