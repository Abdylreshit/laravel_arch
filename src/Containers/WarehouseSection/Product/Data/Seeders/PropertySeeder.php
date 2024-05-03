<?php

namespace App\Containers\WarehouseSection\Product\Data\Seeders;

use App\Containers\WarehouseSection\Product\Models\Property;
use App\Ship\Core\Abstracts\Seeders\Seeder;

class PropertySeeder extends Seeder
{
    public function run()
    {
        Property::factory()
            ->count(10)
            ->create();

        $property = Property::query()->inRandomOrder()->first();

        $property->code = 'COLOR';
        $property->save();
    }
}
