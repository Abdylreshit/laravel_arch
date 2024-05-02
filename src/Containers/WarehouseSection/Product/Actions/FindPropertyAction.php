<?php

namespace App\Containers\WarehouseSection\Product\Actions;

use App\Containers\WarehouseSection\Product\Tasks\EditPropertyByIdTask;
use App\Containers\WarehouseSection\Product\Tasks\FindPropertyByIdTask;
use App\Ship\Core\Abstracts\Actions\Action;

class FindPropertyAction extends Action
{
    public function handle($id)
    {
        $property = app(FindPropertyByIdTask::class)->execute($id);

        return $property;
    }
}
