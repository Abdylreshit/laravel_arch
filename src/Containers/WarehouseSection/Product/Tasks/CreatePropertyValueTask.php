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
                    'name' => [
                        'en' => $data['name']['en'],
                        'ru' => $data['name']['ru'],
                    ],
                    'text' => $property->isText() && $data['value'] != null ? (string)$data['value'] : null,
                    'integer' => $property->isInteger() && $data['value'] != null ? (integer)$data['value'] : null,
                    'decimal' => $property->isDecimal() && $data['value'] != null ? (float)$data['value'] : null,
                    'boolean' => $property->isBoolean() && $data['value'] != null ? (boolean)$data['value'] : null,
                    'color' => $property->isColor() && $data['value'] != null ? (string)$data['value'] : null,
                ]);
        } catch (\Exception $e) {
            throw new ResourceException;
        }

        return $propertyValue;
    }
}
