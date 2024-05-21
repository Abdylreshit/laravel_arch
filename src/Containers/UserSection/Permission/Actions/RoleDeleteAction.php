<?php

namespace App\Containers\UserSection\Permission\Actions;

use App\Containers\UserSection\Permission\Tasks\DeleteRoleByIdTask;
use App\Ship\Core\Abstracts\Actions\Action;

class RoleDeleteAction extends Action
{
    public function handle($roleId)
    {
        app(DeleteRoleByIdTask::class)->execute($roleId);
    }
}
