<?php

namespace App\Containers\StaffSection\Staff\Tests\Unit\Tasks;

use App\Containers\StaffSection\Staff\Models\Staff;
use App\Containers\StaffSection\Staff\Tasks\CreateStaffTask;
use App\Containers\StaffSection\Staff\Tests\Unit\UnitTestCase;

class CreateStaffTaskTest extends UnitTestCase
{
    public function testCreateStaff()
    {
        $data = Staff::factory()->makeOne();

        $staff = app(CreateStaffTask::class)->execute($data->toArray());

        $this->assertTrue($data->email == $staff->email);
        $this->assertDatabaseHas(Staff::class, ['email' => $staff->email]);
    }
}
