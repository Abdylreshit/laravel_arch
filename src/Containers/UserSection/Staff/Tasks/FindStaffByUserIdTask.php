<?php

namespace App\Containers\UserSection\Staff\Tasks;

use App\Containers\UserSection\Staff\Models\Staff;
use App\Ship\Core\Abstracts\Tasks\Task;

class FindStaffByUserIdTask extends Task
{
    public function execute($user_id)
    {
        return Staff::query()
            ->where('user_id', $user_id)
            ->firstOrFail();
    }
}
