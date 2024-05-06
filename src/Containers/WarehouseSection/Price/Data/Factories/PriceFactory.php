<?php

namespace App\Containers\WarehouseSection\Price\Data\Factories;

use App\Containers\WarehouseSection\Price\Models\Casts\PriceCast;
use App\Containers\WarehouseSection\Price\Models\Currency;
use App\Containers\WarehouseSection\Price\Models\Price;
use App\Ship\Core\Abstracts\Factories\Factory;

class PriceFactory extends Factory
{
    protected $model = Price::class;

    public function definition(): array
    {
        return [
            'price' => new PriceCast(
                $this->faker->randomFloat(2, 0, 1000),
                Currency::query()->inRandomOrder()->firstOrFail()
            ),
            'price_currency_id' => getBaseCurrency()->id,
            'price_currency_conversion_id' => Currency::query()->inRandomOrder()->firstOrFail()->id,
            'is_active' => $this->faker->boolean,
            'valid_from' => $this->faker->dateTime,
            'valid_to' => $this->faker->dateTime,
        ];
    }
}
