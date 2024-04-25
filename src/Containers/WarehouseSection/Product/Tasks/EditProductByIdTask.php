<?php

namespace App\Containers\WarehouseSection\Product\Tasks;

use App\Containers\WarehouseSection\Product\Models\Product;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;

class EditProductByIdTask extends Task
{
    public function execute($id, array $data = [])
    {
        $product = Product::query()
            ->findOrFail($id);

        try {
            $product->update([
                'name' => [
                    'en' => $data['name']['en'] ?? $product->getTrans('name', 'en'),
                    'ru' => $data['name']['ru'] ?? $product->getTrans('name', 'ru'),
                ],
                'description' => [
                    'en' => $data['description']['en'] ?? $product->getTrans('description', 'en'),
                    'ru' => $data['description']['ru'] ?? $product->getTrans('description', 'ru'),
                ],
            ]);
        } catch (\Exception) {
            throw new ResourceException;
        }

        return $product;
    }
}
