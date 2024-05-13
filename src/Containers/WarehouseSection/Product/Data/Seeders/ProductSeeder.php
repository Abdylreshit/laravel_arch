<?php

namespace App\Containers\WarehouseSection\Product\Data\Seeders;

use App\Containers\WarehouseSection\Product\Models\Product;
use App\Ship\Core\Abstracts\Seeders\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::factory()->count(50)->create();
    }
}
