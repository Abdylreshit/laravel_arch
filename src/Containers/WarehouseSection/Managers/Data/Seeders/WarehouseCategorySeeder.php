<?php

namespace App\Containers\WarehouseSection\Managers\Data\Seeders;

use App\Containers\WarehouseSection\Category\Models\Category;
use App\Containers\WarehouseSection\Warehouse\Models\Warehouse;
use App\Ship\Core\Abstracts\Seeders\Seeder;

class WarehouseCategorySeeder extends Seeder
{
    public function run(): void
    {
        $warehouses = Warehouse::factory()->count(10)->create();

        foreach ($warehouses as $warehouse) {
            $categories = Category::factory()->count(10)->create([
                'warehouse_id' => $warehouse->id,
            ]);

            $categories->each(function (Category $category) use ($warehouse) {
                Category::factory()->count(10)->create([
                    'parent_id' => $category->id,
                    'warehouse_id' => $warehouse->id
                ]);
            });
        }
    }
}
