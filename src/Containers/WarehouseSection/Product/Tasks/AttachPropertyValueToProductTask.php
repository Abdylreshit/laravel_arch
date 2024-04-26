<?php

namespace App\Containers\WarehouseSection\Product\Tasks;

use App\Containers\WarehouseSection\Product\Models\Product;
use App\Containers\WarehouseSection\Product\Models\PropertyValue;
use App\Ship\Core\Abstracts\Tasks\Task;

class AttachPropertyValueToProductTask extends Task
{
    public function execute(Product $product, PropertyValue $propertyValue)
    {
        if ($product->propertyValues->contains($propertyValue->id)) {
            return;
        }

        $product->propertyValues()->attach($propertyValue->id);
    }
}
