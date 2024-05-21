<?php

namespace App\Containers\UserSection\Permission\Tasks;

use App\Containers\UserSection\Permission\Models\Permission;
use App\Containers\UserSection\Permission\Models\Role;
use App\Ship\Core\Abstracts\Tasks\Task;
use Illuminate\Database\Eloquent\Model;

class RoleAttachPermissionsTask extends Task
{
    public function execute(Role $role, array $permissions)
    {
        $role->syncPermissions($permissions);
    }
}
