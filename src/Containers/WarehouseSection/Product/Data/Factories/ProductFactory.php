<?php

namespace App\Containers\WarehouseSection\Product\Data\Factories;

use App\Containers\WarehouseSection\Product\Enums\ProductType;
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
            'sku' => $this->faker->unique()->randomNumber(8),
            'type' => ProductType::getRandomValue(),
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Product $product) {
            if ($product->type->is(ProductType::BUNDLE)) {
                $product->bundleItems()->attach(
                    Product::factory()->count(3)->create(['type' => ProductType::SIMPLE])
                );
            }
        })->afterMaking(function (Product $product) {
        });
    }
}
