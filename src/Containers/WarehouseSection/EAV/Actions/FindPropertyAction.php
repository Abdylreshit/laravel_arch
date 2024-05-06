<?php

namespace App\Containers\WarehouseSection\EAV\Actions;

use App\Containers\WarehouseSection\EAV\Tasks\EditPropertyByIdTask;
use App\Containers\WarehouseSection\EAV\Tasks\FindPropertyByIdTask;
use App\Ship\Core\Abstracts\Actions\Action;

class FindPropertyAction extends Action
{
    public function handle($id)
    {
        $property = app(FindPropertyByIdTask::class)->execute($id);

        return $property;
    }
}
