<?php

namespace App\Containers\WarehouseSection\Product\Data\Factories;

use App\Containers\WarehouseSection\Product\Models\Barcode;
use App\Ship\Core\Abstracts\Factories\Factory as ParentFactory;

class BarcodeFactory extends ParentFactory
{
    protected $model = Barcode::class;

    public function definition(): array
    {
        return [
            'barcode' => $this->faker->unique()->ean13,
        ];
    }
}
