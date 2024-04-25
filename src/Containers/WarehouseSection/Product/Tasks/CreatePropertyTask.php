<?php

namespace App\Containers\WarehouseSection\Product\Tasks;

use App\Containers\WarehouseSection\Product\Models\Property;
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
                ]);
        } catch (\Exception $e) {
            throw new ResourceException;
        }

        return $property;
    }
}
