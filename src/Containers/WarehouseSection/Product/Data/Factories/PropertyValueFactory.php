<?php

namespace App\Containers\WarehouseSection\Product\Data\Factories;

use App\Containers\WarehouseSection\Product\Enums\PropertyType;
use App\Containers\WarehouseSection\Product\Models\Property;
use App\Containers\WarehouseSection\Product\Models\PropertyValue;
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
            'text' => $property->type === PropertyType::TEXT ? $this->faker->text : null,
            'decimal' => $property->type === PropertyType::DECIMAL ? $this->faker->randomFloat(2, 0, 1000) : null,
            'integer' => $property->type === PropertyType::INTEGER ? $this->faker->randomNumber(2) : null,
            'color' => $property->type === PropertyType::COLOR ? $this->faker->hexColor : null,
        ];
    }
}
