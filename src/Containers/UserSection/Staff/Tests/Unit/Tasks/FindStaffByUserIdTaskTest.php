<?php

namespace App\Containers\UserSection\Staff\Tests\Unit\Tasks;

use App\Containers\UserSection\Staff\Models\Staff;
use App\Containers\UserSection\Staff\Tasks\FindStaffByUserIdTask;
use App\Containers\UserSection\Staff\Tests\Unit\UnitTestCase;

class FindStaffByUserIdTaskTest extends UnitTestCase
{
    public function testFindUserByUserId()
    {
        $data = Staff::factory()->createOne();

        $staff = app(FindStaffByUserIdTask::class)->execute($data->user_id);

        $this->assertTrue($data->id == $staff->id);
    }
}
