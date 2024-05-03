<?php

namespace App\Containers\WarehouseSection\Price\Data\Factories;

use App\Containers\WarehouseSection\Price\Models\Currency;
use App\Containers\WarehouseSection\Price\Models\CurrencyConversation;
use App\Ship\Core\Abstracts\Factories\Factory;

class CurrencyConversationFactory extends Factory
{
    protected $model = CurrencyConversation::class;

    public function definition(): array
    {
        return [
            'base_currency_id' => getBaseCurrency()->id,
            'rate' => $this->faker->randomFloat(2, 0, 1000),
            'valid_from' => $this->faker->dateTime,
            'valid_to' => $this->faker->dateTime,
            'is_active' => $this->faker->boolean,
            'note' => $this->faker->text,
        ];
    }
}
