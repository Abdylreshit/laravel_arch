<?php

namespace App\Containers\WarehouseSection\EAV\Data\Seeders;

use App\Containers\WarehouseSection\EAV\Models\Property;
use App\Ship\Core\Abstracts\Seeders\Seeder;

class PropertySeeder extends Seeder
{
    public function run()
    {
        Property::factory()
            ->count(20)
            ->create();
    }
}
