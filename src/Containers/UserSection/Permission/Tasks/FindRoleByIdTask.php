<?php

namespace App\Containers\UserSection\Permission\Tasks;

use App\Containers\UserSection\Permission\Models\Role;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;

class FindRoleByIdTask extends Task
{
    public function execute($roleId)
    {
        $role = Role::query()->findOrFail($roleId);

        return $role;
    }
}
