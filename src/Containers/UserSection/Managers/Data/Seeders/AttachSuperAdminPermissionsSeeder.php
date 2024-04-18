<?php

namespace App\Containers\UserSection\Managers\Data\Seeders;

use App\Containers\UserSection\Managers\StaffPermissionManager;
use App\Containers\UserSection\Staff\Tasks\FindStaffByEmailTask;
use App\Ship\Core\Abstracts\Seeders\Seeder;

class AttachSuperAdminPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        $staff = app(FindStaffByEmailTask::class)->execute('admin@admin.com');
//
        app(StaffPermissionManager::class)->syncAllPermissionsToStaff($staff);
    }
}
