<?php

namespace App\Containers\AuthenticationSection\Sanctum\Tests\Unit\Admin\Actions;

use App\Containers\AuthenticationSection\Sanctum\Actions\Admin\LoginAction;
use App\Containers\AuthenticationSection\Sanctum\Actions\Admin\LogoutAction;
use App\Containers\AuthenticationSection\Sanctum\Tests\Unit\UnitTestCase;
use App\Containers\UserSection\Staff\Models\Staff;
use Laravel\Sanctum\PersonalAccessToken;

class LogoutActionTest extends UnitTestCase
{
    public function testStaffLoginAction()
    {
        $staff = Staff::factory()->createOne();

        LoginAction::run([
            'email' => $staff->email,
            'password' => '123123',
        ]);

        LogoutAction::run($staff);

        $this->assertTrue(! PersonalAccessToken::where('tokenable_id', $staff->id)->exists());
    }
}
