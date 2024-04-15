<?php

namespace App\Containers\StaffSection\Permission\Tasks;

use App\Containers\StaffSection\Permission\Models\Permission;
use App\Ship\Core\Abstracts\Tasks\Task;

class PermissionUpdateOrCreateTask extends Task
{
    public function execute(array $data): void
    {
        Permission::query()->updateOrCreate($data, $data);
    }
}
