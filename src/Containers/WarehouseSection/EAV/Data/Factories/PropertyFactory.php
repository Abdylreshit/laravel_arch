<?php

namespace App\Containers\WarehouseSection\EAV\Data\Factories;

use App\Containers\WarehouseSection\EAV\Enums\PropertyType;
use App\Containers\WarehouseSection\EAV\Models\Property;
use App\Ship\Core\Abstracts\Factories\Factory as ParentFactory;
use Illuminate\Support\Str;

class PropertyFactory extends ParentFactory
{
    protected $model = Property::class;

    public function definition(): array
    {
        return [
            'name' => [
                'en' => $this->faker->name,
                'ru' => $this->faker->name,
            ],
            'type' => PropertyType::getRandomValue(),
        ];
    }

    public function configure(): static
    {
        return $this->afterMaking(function (Property $property) {
            $property->code = Str::upper(Str::random(5));
        });
    }
}
