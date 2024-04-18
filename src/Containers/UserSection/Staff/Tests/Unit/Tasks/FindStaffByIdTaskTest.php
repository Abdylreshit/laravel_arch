<?php

namespace App\Containers\UserSection\Staff\Tests\Unit\Tasks;

use App\Containers\UserSection\Staff\Models\Staff;
use App\Containers\UserSection\Staff\Tasks\FindStaffByIdTask;
use App\Containers\UserSection\Staff\Tests\Unit\UnitTestCase;

class FindStaffByIdTaskTest extends UnitTestCase
{
    public function testFindUserById()
    {
        $data = Staff::factory()->createOne();

        $user = app(FindStaffByIdTask::class)->execute($data->id);

        $this->assertTrue($data->id == $user->id);
    }
}
