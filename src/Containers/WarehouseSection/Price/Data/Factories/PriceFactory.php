<?php

namespace App\Containers\WarehouseSection\Price\Data\Factories;

use App\Containers\WarehouseSection\Price\Models\Currency;
use App\Containers\WarehouseSection\Price\Models\Price;
use App\Ship\Core\Abstracts\Factories\Factory;

class PriceFactory extends Factory
{
    protected $model = Price::class;

    public function definition(): array
    {
        return [
            'price' => $this->faker->randomFloat(2, 0, 1000),
            'price_currency_id' => Currency::query()->inRandomOrder()->first()->id,
            'is_active' => $this->faker->boolean,
            'valid_from' => now(),
            'valid_to' => now()->addYear(),
        ];
    }
}
