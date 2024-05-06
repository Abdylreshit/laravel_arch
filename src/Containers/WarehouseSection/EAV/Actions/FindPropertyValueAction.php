<?php

namespace App\Containers\WarehouseSection\EAV\Actions;

use App\Containers\WarehouseSection\EAV\Tasks\FindPropertyValueByIdTask;
use App\Ship\Core\Abstracts\Actions\Action;

class FindPropertyValueAction extends Action
{
    public function handle($id)
    {
        $propertyValue = app(FindPropertyValueByIdTask::class)->execute($id);

        return $propertyValue;
    }
}
