<?php

namespace App\Containers\WarehouseSection\EAV\Tasks;

use App\Containers\WarehouseSection\EAV\Models\Property;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;

class CreatePropertyTask extends Task
{
    public function execute(array $data)
    {

        try {
            $property = Property::query()
                ->create([
                    'name' => [
                        'en' => $data['name']['en'],
                        'ru' => $data['name']['ru'],
                    ],
                    'type' => $data['type'],
                ]);
        } catch (\Exception $e) {
            throw new ResourceException(['message' => $e->getMessage()]);
        }

        return $property;
    }
}
