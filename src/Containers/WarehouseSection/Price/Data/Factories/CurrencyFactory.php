<?php

namespace App\Containers\WarehouseSection\Price\Data\Factories;

use App\Containers\WarehouseSection\Price\Models\Currency;
use App\Ship\Core\Abstracts\Factories\Factory;

class CurrencyFactory extends Factory
{
    protected $model = Currency::class;

    public function definition(): array
    {
        return [
            'name' => [
                'en' => $this->faker->word,
                'ru' => $this->faker->word,
            ],
            'code' => $this->faker->unique()->currencyCode,
            'symbol' => $this->faker->randomAscii
        ];
    }
}
