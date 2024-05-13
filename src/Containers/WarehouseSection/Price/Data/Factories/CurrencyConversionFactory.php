<?php

namespace App\Containers\WarehouseSection\Price\Data\Factories;

use App\Containers\WarehouseSection\Price\Models\CurrencyConversion;
use App\Ship\Core\Abstracts\Factories\Factory;

class CurrencyConversionFactory extends Factory
{
    protected $model = CurrencyConversion::class;

    public function definition(): array
    {
        return [
            'base_currency_id' => getBaseCurrency()->id,
            'rate' => $this->faker->randomFloat(2, 0, 1000),
            'valid_from' => now()->subDay(),
            'valid_to' => now()->addYear(),
            'is_active' => $this->faker->boolean,
            'note' => $this->faker->text,
        ];
    }
}
