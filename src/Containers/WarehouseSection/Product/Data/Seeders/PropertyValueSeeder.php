<?php

namespace App\Containers\WarehouseSection\Product\Data\Seeders;

use App\Containers\WarehouseSection\Product\Models\PropertyValue;
use App\Ship\Core\Abstracts\Seeders\Seeder;

class PropertyValueSeeder extends Seeder
{
    public function run()
    {
        PropertyValue::factory()
            ->count(200)
            ->create();
    }
}
