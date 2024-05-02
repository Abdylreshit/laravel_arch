<?php

namespace App\Containers\WarehouseSection\Product\Data\Seeders;

use App\Ship\Core\Abstracts\Seeders\Seeder;

class PropertyValueSeeder extends Seeder
{
    public function run()
    {

        $properties = \App\Containers\WarehouseSection\Product\Models\Property::all();

        foreach ($properties as $property) {
            $property->values()->createMany(
                \App\Containers\WarehouseSection\Product\Models\PropertyValue::factory()
                    ->count(10)
                    ->make()
                    ->toArray()
            );
        }
    }
}
