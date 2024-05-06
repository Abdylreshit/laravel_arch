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
                        'en' => $data['value']['en'],
                        'ru' => $data['value']['ru'],
                    ],
                    'text' => $property->isText() ? (string)$data['value'] : null,
                    'integer' => $property->isInteger() ? (integer)$data['value'] : null,
                    'decimal' => $property->isDecimal() ? (float)$data['value'] : null,
                    'boolean' => $property->isBoolean() ? (boolean)$data['value'] : null,
                    'color' => $property->isColor() ? (string)$data['value'] : null,
                ]);
        } catch (\Exception $e) {
            throw new ResourceException;
        }

        return $propertyValue;
    }
}
