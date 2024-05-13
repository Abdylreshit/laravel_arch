<?php

namespace App\Containers\WarehouseSection\Product\UI\API\Resources;

use App\Ship\Core\Abstracts\Resources\Resource;
use App\Ship\Core\Resources\EnumResource;

class ListProductResource extends Resource
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function ($product) {
                return [
                    'id' => $product->id,
                    'name' => [
                        'ru' => $product->translate('name', 'ru'),
                        'en' => $product->translate('name', 'en'),
                    ],
                    'description' => [
                        'ru' => $product->translate('description', 'ru'),
                        'en' => $product->translate('description', 'en'),
                    ],
                    'type' => new EnumResource($product->type),
                    'images' => $product
                        ->getMedia()
                        ?->map(fn($image) => $image->getFullUrl()),
                    'stock_quantity' => $product->stocks_sum_quantity,
                    'stock_on_hand' => $product->stocks_sum_on_hand,
                    'stock_on_reserve' => $product->stocks_sum_on_reserve,
                ];
            }),
            'pagination' => $this->paginationResource(),
        ];
    }
}
