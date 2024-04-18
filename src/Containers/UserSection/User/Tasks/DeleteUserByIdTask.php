<?php

namespace App\Containers\UserSection\User\Tasks;

use App\Containers\UserSection\User\Models\User;
use App\Ship\Core\Abstracts\Tasks\Task;

class DeleteUserByIdTask extends Task
{
    public function execute($id): void
    {
        $user = User::query()->findOrFail($id);
        $user->delete();
    }
}
