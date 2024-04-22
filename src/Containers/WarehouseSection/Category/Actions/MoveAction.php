<?php

namespace App\Containers\WarehouseSection\Category\Actions;

use App\Containers\WarehouseSection\Category\Tasks\MoveCategoryTask;
use App\Ship\Core\Abstracts\Actions\Action;

class MoveAction extends Action
{
    public function handle(array $data)
    {
        $category = app(MoveCategoryTask::class)
            ->execute(
                $data['id'],
                $data
            );
    }
}
