<?php

namespace App\Containers\WarehouseSection\Product\Tasks;

use App\Containers\WarehouseSection\Product\Models\Property;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;

class CreatePropertyValueTask extends Task
{
    public function execute(Property $property, array $data)
    {
        try {
            $propertyValue = $property->values()
                ->create([
                    'value' => [
                        'en' => $data['value']['en'],
                        'ru' => $data['value']['ru'],
                    ],
                ]);
        } catch (\Exception $e) {
            throw new ResourceException;
        }

        return $propertyValue;
    }
}
