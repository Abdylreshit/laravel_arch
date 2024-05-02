<?php

namespace App\Containers\WarehouseSection\Product\Actions;

use App\Containers\WarehouseSection\Product\Models\PropertyValue;
use App\Ship\Core\Abstracts\Actions\Action;

class ListPropertyValueAttachedProductAction extends Action
{
    public function handle()
    {
        $properties = PropertyValue::with('values')->get();

        return $properties;
    }
}
