<?php

namespace App\Containers\UserSection\Permission\Tasks;

use App\Containers\UserSection\Permission\Models\Role;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;

class RoleRestoreByIdTask extends Task
{
    public function execute($roleId)
    {
        $role = Role::withTrashed()->findOrFail($roleId);

        if (!$role->trashed()) {
            $role->restore();
        }

        return $role;
    }
}
