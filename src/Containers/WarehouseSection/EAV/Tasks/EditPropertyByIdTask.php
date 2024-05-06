<?php

namespace App\Containers\WarehouseSection\EAV\Tasks;

use App\Containers\WarehouseSection\EAV\Models\Property;
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
                'type' => $data['type'] ?? $property->type,
            ]);
        } catch (\Exception) {
            throw new ResourceException;
        }

        return $property;
    }
}
