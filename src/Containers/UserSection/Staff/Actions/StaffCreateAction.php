<?php

namespace App\Containers\UserSection\Staff\Actions;

use App\Containers\UserSection\Managers\StaffPermissionManager;
use App\Containers\UserSection\Staff\Tasks\AttachStaffAvatarTask;
use App\Containers\UserSection\Staff\Tasks\CreateStaffTask;
use App\Ship\Core\Abstracts\Actions\Action;

class StaffCreateAction extends Action
{
    public function handle(array $data, $roles = [])
    {
        $staff = app(CreateStaffTask::class)->execute([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'] ?? null,
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'password' => $data['password'],
            'is_blocked' => $data['is_blocked'],
        ]);

        if (isset($data['avatar'])) {
            app(AttachStaffAvatarTask::class)
                ->execute($staff, $data['avatar']);
        }

        if (count($roles) > 0) {
            app(StaffPermissionManager::class)
                ->syncRolesToStaff($staff, $roles);
        }

        return $staff;
    }
}
