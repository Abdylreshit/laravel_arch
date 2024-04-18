<?php

namespace App\Containers\UserSection\Staff\Tests\Unit\Tasks;

use App\Containers\UserSection\Staff\Models\Staff;
use App\Containers\UserSection\Staff\Tasks\DeleteStaffByUserIdTask;
use App\Containers\UserSection\Staff\Tests\Unit\UnitTestCase;

class DeleteStaffByUserIdTaskTest extends UnitTestCase
{
    public function testDeleteStaffById()
    {
        $data = Staff::factory()->createOne();

        app(DeleteStaffByUserIdTask::class)->execute($data->user_id);

        $this->assertSoftDeleted(Staff::class, ['id' => $data->id]);
    }
}
