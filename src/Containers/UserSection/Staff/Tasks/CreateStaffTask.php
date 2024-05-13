<?php

namespace App\Containers\UserSection\Staff\Tasks;

use App\Containers\UserSection\Staff\Models\Staff;
use App\Ship\Core\Abstracts\Tasks\Task;
use App\Ship\Exceptions\ResourceException;

class CreateStaffTask extends Task
{
    public function execute($user_id, ?array $data = null)
    {
        try {
            $staff = Staff::create([
                'user_id' => $user_id,
            ]);
        } catch (\Exception $e) {
            throw new ResourceException(['message' => $e->getMessage()]);
        }

        return $staff;
    }
}
