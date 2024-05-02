<?php

namespace App\Containers\WarehouseSection\Supplier\Data\Factories;

use App\Containers\WarehouseSection\Supplier\Models\Supplier;
use App\Ship\Core\Abstracts\Factories\Factory;

class SupplierFactory extends Factory
{
    protected $model = Supplier::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
            'note' => $this->faker->text,
        ];
    }
}
