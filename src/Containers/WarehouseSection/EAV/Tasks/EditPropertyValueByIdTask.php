<?php

namespace App\Containers\WarehouseSection\EAV\Tasks;

use App\Containers\WarehouseSection\EAV\Models\PropertyValue;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;

class EditPropertyValueByIdTask extends Task
{
    public function execute($id, array $data = [])
    {
        $propertyValue = PropertyValue::query()
            ->findOrFail($id);

        try {
            $propertyValue->update([
                'name' => [
                    'en' => $data['name']['en'] ?? $propertyValue->getTrans('name', 'en'),
                    'ru' => $data['name']['ru'] ?? $propertyValue->getTrans('name', 'ru'),
                ],
                'text' => $propertyValue->property->isText() && $data['value'] != null ? (string)$data['value'] : $propertyValue->text,
                'integer' => $propertyValue->property->isInteger() && $data['value'] != null ? (integer)$data['value'] : $propertyValue->integer,
                'decimal' => $propertyValue->property->isDecimal() && $data['value'] != null ? (float)$data['value'] : $propertyValue->decimal,
                'boolean' => $propertyValue->property->isBoolean() ? (boolean)$data['value'] : $propertyValue->boolean,
                'color' => $propertyValue->property->isColor() && $data['value'] != null ? (string)$data['value'] : $propertyValue->color,
            ]);
        } catch (\Exception) {
            throw new ResourceException(['message' => $e->getMessage()]);
        }

        return $propertyValue;
    }
}
