<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Data\Factories;

use App\Containers\WarehouseSection\MeasurementUnit\Models\Measurement;
use App\Containers\WarehouseSection\MeasurementUnit\Models\MeasurementUnit;
use App\Ship\Core\Abstracts\Factories\Factory as ParentFactory;
use Illuminate\Support\Str;

class MeasurementUnitFactory extends ParentFactory
{
    protected $model = MeasurementUnit::class;

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
            ],
            'symbol' => $this->faker->unique()->slug,
            'measurement_id' => Measurement::query()->inRandomOrder()->first()?->id,
        ];
    }

    public function configure(): static
    {
        return $this->afterMaking(function (MeasurementUnit $measurementUnit) {
            $measurementUnit->code = Str::upper(Str::slug($measurementUnit->symbol));
        });
    }
}
