<?php

namespace App\Containers\WarehouseSection\Supplier\Data\Seeders;

use App\Containers\WarehouseSection\Supplier\Models\Supplier;
use App\Ship\Core\Abstracts\Seeders\Seeder;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        Supplier::factory()->count(50)->create();
    }
}
