<?php

namespace App\Containers\WarehouseSection\Product\Tasks;

use App\Containers\WarehouseSection\Product\Models\PropertyValue;
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
                'text' => $data['value'] ? (string)$data['value'] : $propertyValue->text,
                'integer' => $data['value'] ? (integer)$data['value'] : $propertyValue->integer,
                'decimal' => $data['value'] ? (float)$data['value'] : $propertyValue->decimal,
                'boolean' => $data['value'] ? (boolean)$data['value'] : $propertyValue->boolean,
                'color' => $data['value'] ? (string)$data['value'] : $propertyValue->color
            ]);
        } catch (\Exception) {
            throw new ResourceException;
        }

        return $propertyValue;
    }
}
