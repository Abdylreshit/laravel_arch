<?php

namespace App\Containers\AuthenticationSection\Sanctum\Tests\Functional;

use App\Containers\StaffSection\Staff\Models\Staff;
use App\Ship\Tests\TestCase;

class ApiTestCase extends TestCase
{
    protected function getStaffToken(): string
    {
        $staff = Staff::factory()->createOne();

        return $staff->createToken('PAT')->plainTextToken;
    }
}
