<?php

namespace App\Containers\WarehouseSection\EAV\Actions;

use App\Containers\WarehouseSection\EAV\Models\Property;
use App\Ship\Core\Abstracts\Actions\Action;

class ListPropertyValueAttachedProductAction extends Action
{
    public function handle()
    {
        $properties = Property::with('values')->get();

        return $properties;
    }
}
