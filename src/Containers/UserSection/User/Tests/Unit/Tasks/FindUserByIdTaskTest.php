<?php

namespace App\Containers\UserSection\User\Tests\Unit\Tasks;

use App\Containers\UserSection\User\Models\User;
use App\Containers\UserSection\User\Tasks\FindUserByIdTask;
use App\Containers\UserSection\User\Tests\Unit\UnitTestCase;

class FindUserByIdTaskTest extends UnitTestCase
{
    public function testFindUserById()
    {
        $data = User::factory()->createOne();

        $user = app(FindUserByIdTask::class)->execute($data->id);

        $this->assertTrue($data->id == $user->id && $user->email == $data->email);
    }
}
