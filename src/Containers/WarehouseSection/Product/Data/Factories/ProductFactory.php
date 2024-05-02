<?php

namespace App\Containers\WarehouseSection\Product\Data\Factories;

use App\Containers\WarehouseSection\Product\Models\Product;
use App\Ship\Core\Abstracts\Factories\Factory as ParentFactory;

class ProductFactory extends ParentFactory
{
    protected $model = Product::class;

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
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Product $product) {
            //            $product->addMedia(storage_path('app/public/products'))
            //                ->preservingOriginal()
            //                ->toMediaCollection('images');
        });
    }
}
