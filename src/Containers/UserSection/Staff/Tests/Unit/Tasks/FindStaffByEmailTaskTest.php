<?php

namespace App\Containers\UserSection\Staff\Tests\Unit\Tasks;

use App\Containers\UserSection\Staff\Models\Staff;
use App\Containers\UserSection\Staff\Tasks\FindStaffByEmailTask;
use App\Containers\UserSection\Staff\Tests\Unit\UnitTestCase;

class FindStaffByEmailTaskTest extends UnitTestCase
{
    public function testFindStaffByEmail()
    {
        $data = Staff::factory()->createOne();

        $staff = app(FindStaffByEmailTask::class)->execute($data->email);

        $this->assertTrue($data->id == $staff->id && $staff->email == $data->email);
    }
}
