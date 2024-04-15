<?php

namespace App\Containers\StaffSection\Permission\Tasks;

use App\Containers\StaffSection\Permission\Models\Permission;
use App\Ship\Core\Abstracts\Tasks\Task;
use Illuminate\Database\Eloquent\Model;

class FindByNamePermissionTask extends Task
{
    public function execute(string $name): Model
    {
        return Permission::query()->where('name', $name)->firstOrFail();
    }
}
