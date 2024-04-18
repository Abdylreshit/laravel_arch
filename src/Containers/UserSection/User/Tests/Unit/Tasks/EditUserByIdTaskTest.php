<?php

namespace App\Containers\UserSection\User\Tests\Unit\Tasks;

use App\Containers\UserSection\User\Models\User;
use App\Containers\UserSection\User\Tasks\EditUserByIdTask;
use App\Containers\UserSection\User\Tests\Unit\UnitTestCase;

class EditUserByIdTaskTest extends UnitTestCase
{
    public function testEditUserById()
    {
        $data = User::factory()->createOne();
        $editData = User::factory()->makeOne();

        $user = app(EditUserByIdTask::class)->execute($data->id, $editData->toArray());

        $this->assertTrue($data->id == $user->id && $user->email == $editData->email);
    }
}
