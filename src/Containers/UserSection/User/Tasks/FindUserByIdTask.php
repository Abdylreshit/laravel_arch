<?php

namespace App\Containers\UserSection\User\Tasks;

use App\Containers\UserSection\User\Models\User;
use App\Ship\Core\Abstracts\Tasks\Task;

class FindUserByIdTask extends Task
{
    public function execute($id)
    {
        return User::query()->findOrFail($id);
    }
}
