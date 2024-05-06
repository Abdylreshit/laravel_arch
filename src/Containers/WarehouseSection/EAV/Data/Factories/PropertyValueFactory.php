<?php

namespace App\Containers\WarehouseSection\EAV\Data\Factories;

use App\Containers\WarehouseSection\EAV\Models\Property;
use App\Containers\WarehouseSection\EAV\Models\PropertyValue;
use App\Ship\Core\Abstracts\Factories\Factory as ParentFactory;

class PropertyValueFactory extends ParentFactory
{
    protected $model = PropertyValue::class;

    public function definition(): array
    {
        $property = Property::query()->inRandomOrder()->first();

        return [
            'name' => [
                'en' => $this->faker->name,
                'ru' => $this->faker->name,
            ],
            'property_id' => $property->id,
            'text' => $property->isText() ? $this->faker->text : null,
            'decimal' => $property->isDecimal() ? $this->faker->randomFloat(2, 0, 1000) : null,
            'integer' => $property->isInteger() ? $this->faker->randomNumber(2) : null,
            'color' => $property->isColor() ? $this->faker->hexColor : null,
        ];
    }
}
