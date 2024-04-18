<?php

namespace App\Containers\UserSection\User\Tests\Unit\Tasks;

use App\Containers\UserSection\User\Models\User;
use App\Containers\UserSection\User\Tasks\FindUserByEmailTask;
use App\Containers\UserSection\User\Tests\Unit\UnitTestCase;

class FindUserByEmailTaskTest extends UnitTestCase
{
    public function testFindUserByEmail()
    {
        $data = User::factory()->createOne();

        $user = app(FindUserByEmailTask::class)->execute($data->email);

        $this->assertTrue($data->id == $user->id && $user->email == $data->email);
    }
}
