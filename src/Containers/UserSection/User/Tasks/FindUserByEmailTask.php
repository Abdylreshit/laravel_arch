<?php

namespace App\Containers\UserSection\User\Tasks;

use App\Containers\UserSection\User\Models\User;
use App\Ship\Core\Abstracts\Tasks\Task;

class FindUserByEmailTask extends Task
{
    public function execute($email)
    {
        return User::query()->where('email', $email)->firstOrFail();
    }
}
