<?php

namespace App\Containers\WarehouseSection\Product\Tasks;

use App\Containers\WarehouseSection\Product\Models\Product;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;

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
                        'en' => $data['description']['en'],
                        'ru' => $data['description']['ru'],
                    ]
                ]);
        } catch (\Exception $e) {
            throw new ResourceException;
        }

        return $product;
    }
}
