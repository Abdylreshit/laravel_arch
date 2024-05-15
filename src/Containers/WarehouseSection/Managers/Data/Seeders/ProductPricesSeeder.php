<?php

namespace App\Containers\WarehouseSection\Managers\Data\Seeders;

use App\Containers\WarehouseSection\Category\Models\Category;
use App\Containers\WarehouseSection\Price\Models\Price;
use App\Containers\WarehouseSection\Product\Models\Product;
use App\Containers\WarehouseSection\Warehouse\Models\Warehouse;
use App\Ship\Core\Abstracts\Seeders\Seeder;

class ProductPricesSeeder extends Seeder
{
    public function run(): void
    {
        $warehouses = Warehouse::factory()->count(10)->create();

        $products = Product::query()->get();

        $products->each(function (Product $product) use ($warehouses) {
            $warehouses->each(function (Warehouse $warehouse) use ($product) {
                $quantity = rand(0, 100);
                $onHand = rand(0, $quantity);
                $onReserve = $quantity - $onHand;

                $product->stocks()->create([
                    'warehouse_id' => $warehouse->id,
                    'quantity' => $quantity,
                    'on_hand' => $onHand,
                    'on_reserve' => $onReserve
                ]);

                $prices = Price::factory()->count(5)->create([
                    'warehouse_id' => $warehouse->id
                ]);

                $product->prices()->saveMany($prices);
            });
        });
    }
}
