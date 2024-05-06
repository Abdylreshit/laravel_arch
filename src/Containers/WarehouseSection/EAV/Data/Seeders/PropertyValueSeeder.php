<?php

namespace App\Containers\WarehouseSection\EAV\Data\Seeders;

use App\Containers\WarehouseSection\EAV\Models\PropertyValue;
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
