<?php

namespace App\Containers\WarehouseSection\Product\Data\Factories;

use App\Containers\WarehouseSection\Product\Models\PropertyValue;
use App\Ship\Core\Abstracts\Factories\Factory as ParentFactory;
use Illuminate\Support\Str;

class PropertyValueFactory extends ParentFactory
{
    protected $model = PropertyValue::class;

    public function definition(): array
    {
        return [
            'value' => [
                'en' => $this->faker->name,
                'ru' => $this->faker->name,
            ],
        ];
    }
}
