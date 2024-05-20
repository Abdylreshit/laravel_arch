<?php

namespace App\Containers\WarehouseSection\Product\UI\API\Resources;

use App\Ship\Core\Abstracts\Resources\ResourceCollection;
use App\Ship\Core\Resources\EnumResource;

class ListProductResource extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function ($product) {
                return [
                    'id' => $product->id,
                    'name' => [
                        'ru' => $product->getTrans('name', 'ru'),
                        'en' => $product->getTrans('name', 'en'),
                    ],
                    'description' => [
                        'ru' => $product->getTrans('description', 'ru'),
                        'en' => $product->getTrans('description', 'en'),
                    ],
                    'type' => new EnumResource($product->type),
                    'images' => $product
                        ->getMedia()
                        ?->map(fn($image) => $image->getFullUrl()),
                    'stock_quantity' => $product->stocks_sum_quantity ?? 0,
                    'stock_on_hand' => $product->stocks_sum_on_hand ?? 0,
                    'stock_on_reserve' => $product->stocks_sum_on_reserve ?? 0,
                ];
            }),
            'pagination' => $this->paginationResource(),
        ];
    }
}
