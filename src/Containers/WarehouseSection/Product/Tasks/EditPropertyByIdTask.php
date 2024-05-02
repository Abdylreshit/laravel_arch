<?php

namespace App\Containers\WarehouseSection\Product\Tasks;

use App\Containers\WarehouseSection\Product\Models\Property;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;

class EditPropertyByIdTask extends Task
{
    public function execute($id, array $data = [])
    {
        $property = Property::query()
            ->findOrFail($id);

        try {
            $property->update([
                'name' => [
                    'en' => $data['name']['en'] ?? $property->getTrans('name', 'en'),
                    'ru' => $data['name']['ru'] ?? $property->getTrans('name', 'ru'),
                ],
            ]);
        } catch (\Exception) {
            throw new ResourceException;
        }

        return $property;
    }
}
