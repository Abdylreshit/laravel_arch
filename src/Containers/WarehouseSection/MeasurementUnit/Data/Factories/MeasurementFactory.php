<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Data\Factories;

use App\Containers\WarehouseSection\MeasurementUnit\Models\Measurement;
use App\Ship\Core\Abstracts\Factories\Factory as ParentFactory;
use Illuminate\Support\Str;

class MeasurementFactory extends ParentFactory
{
    protected $model = Measurement::class;

    public function definition(): array
    {
        return [
            'name' => [
                'en' => $this->faker->name,
                'ru' => $this->faker->name,
            ],
            'description' => [
                'en' => $this->faker->text,
                'ru' => $this->faker->text,
            ]
        ];
    }
}
