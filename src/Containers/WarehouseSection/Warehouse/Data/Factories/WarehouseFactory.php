<?php

namespace App\Containers\WarehouseSection\Warehouse\Data\Factories;

use App\Containers\WarehouseSection\Warehouse\Models\Warehouse;
use App\Ship\Core\Abstracts\Factories\Factory as ParentFactory;
use Illuminate\Support\Str;

class WarehouseFactory extends ParentFactory
{
    protected $model = Warehouse::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->name,
            'is_blocked' => $this->faker->boolean,
        ];
    }

    public function configure(): static
    {
        return $this->afterMaking(function (Warehouse $warehouse) {
            $warehouse->code = Str::random(5);
        });
    }
}
