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
                'value' => [
                    'en' => $data['value']['en'] ?? $propertyValue->getTrans('value', 'en'),
                    'ru' => $data['value']['ru'] ?? $propertyValue->getTrans('value', 'ru'),
                ]
            ]);
        } catch (\Exception) {
            throw new ResourceException;
        }

        return $propertyValue;
    }
}
