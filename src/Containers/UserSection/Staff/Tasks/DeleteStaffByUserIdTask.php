<?php

namespace App\Containers\UserSection\Staff\Tasks;

use App\Containers\UserSection\Staff\Models\Staff;
use App\Ship\Core\Abstracts\Tasks\Task;

class DeleteStaffByUserIdTask extends Task
{
    public function execute($user_id): void
    {
        $staff = Staff::query()
            ->where('user_id', $user_id)
            ->firstOrFail();

        $staff->delete();
    }
}
