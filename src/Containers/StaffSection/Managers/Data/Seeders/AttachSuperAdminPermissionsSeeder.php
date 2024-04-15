<?php

namespace App\Containers\StaffSection\Managers\Data\Seeders;

use App\Containers\StaffSection\Managers\StaffPermissionManager;
use App\Containers\StaffSection\Staff\Tasks\FindByEmailStaffTask;
use App\Ship\Core\Abstracts\Seeders\Seeder;

class AttachSuperAdminPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        $staff = app(FindByEmailStaffTask::class)->execute('admin@admin.com');

        app(StaffPermissionManager::class)->syncAllPermissionsToStaff($staff);
    }
}
