<?php

namespace App\Containers\WarehouseSection\Discount\Data\Factories;

use App\Containers\WarehouseSection\Discount\Models\Discount;
use App\Ship\Core\Abstracts\Factories\Factory;

class DiscountFactory extends Factory
{
    protected $model = Discount::class;

    public function definition(): array
    {
        return [
        ];
    }
}
