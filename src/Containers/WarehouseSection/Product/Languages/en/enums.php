<?php

declare(strict_types=1);


use App\Containers\WarehouseSection\Product\Enums\ProductType;

return [

    ProductType::class => [
        ProductType::SIMPLE => 'Simple',
        ProductType::BUNDLE => 'Bundle',
    ],
];
