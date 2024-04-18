<?php

namespace App\Containers\UserSection\Staff\Tests\Unit\Tasks;

use App\Containers\UserSection\Staff\Models\Staff;
use App\Containers\UserSection\Staff\Tasks\CreateStaffTask;
use App\Containers\UserSection\Staff\Tests\Unit\UnitTestCase;

class CreateStaffTaskTest extends UnitTestCase
{
    public function testCreateStaff()
    {
        $data = Staff::factory()->makeOne();

        $staff = app(CreateStaffTask::class)->execute($data->user_id);

        $this->assertTrue($data->user_id == $staff->user_id);
        $this->assertDatabaseHas(Staff::class, ['user_id' => $staff->user_id]);
    }
}
