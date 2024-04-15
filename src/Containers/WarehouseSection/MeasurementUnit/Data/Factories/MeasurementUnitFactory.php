<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Data\Factories;

use App\Containers\WarehouseSection\MeasurementUnit\Enums\TypeEnum;
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
            'type' => $this->faker->randomElement(TypeEnum::asArray()),
            'symbol' => $this->faker->unique()->slug,
            'conversion_factor_to_base_unit' => $this->faker->randomFloat(2, 0, 1000),
        ];
    }

    public function configure(): static
    {
        return $this->afterMaking(function (MeasurementUnit $measurementUnit) {
            $measurementUnit->code = Str::upper(Str::slug($measurementUnit->symbol));
        });
    }
}
