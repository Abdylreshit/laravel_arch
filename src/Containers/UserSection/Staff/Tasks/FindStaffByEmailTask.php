<?php

namespace App\Containers\UserSection\Staff\Tasks;

use App\Containers\UserSection\Staff\Models\Staff;
use App\Ship\Core\Abstracts\Tasks\Task;

class FindStaffByEmailTask extends Task
{
    public function execute($email)
    {
        return Staff::query()
            ->whereHas('user', fn($query) => $query->where('email', $email))
            ->firstOrFail();
    }
}
