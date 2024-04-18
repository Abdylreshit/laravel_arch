<?php

namespace App\Containers\WarehouseSection\Category\Tests\Functional;

use App\Containers\UserSection\Managers\StaffPermissionManager;
use App\Containers\UserSection\Permission\Data\Seeders\PermissionSeeder;
use App\Containers\UserSection\Staff\Models\Staff;
use App\Ship\Tests\TestCase;
use Illuminate\Support\Facades\App;

class ApiTestCase extends TestCase
{
    protected function getStaffToken(): string
    {
        $staff = Staff::factory()->createOne();

        App::call(PermissionSeeder::class);

        app(StaffPermissionManager::class)->syncContainerPermissionsToStaff($staff, 'Category');

        return $staff->createToken('PAT')->plainTextToken;
    }
}
