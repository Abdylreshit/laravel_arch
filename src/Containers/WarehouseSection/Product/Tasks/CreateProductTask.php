<?php

namespace App\Containers\WarehouseSection\Product\Tasks;

use App\Containers\WarehouseSection\Product\Enums\ProductType;
use App\Containers\WarehouseSection\Product\Models\Product;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;
use Illuminate\Support\Str;

class CreateProductTask extends Task
{
    public function execute(array $data)
    {
        try {
            $product = Product::query()
                ->create([
                    'name' => [
                        'en' => $data['name']['en'],
                        'ru' => $data['name']['ru'],
                    ],
                    'description' => [
                        'en' => $data['description']['en'] ?? null,
                        'ru' => $data['description']['ru'] ?? null,
                    ],
                    'type' => $data['type'] ?? ProductType::SIMPLE,
                ]);
        } catch (\Exception $e) {
            throw new ResourceException(['message' => $e->getMessage()]);
        }

        return $product;
    }
}
