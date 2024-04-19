<?php

namespace App\Containers\AuthenticationSection\Sanctum\Actions\Admin;

use App\Containers\AuthenticationSection\Sanctum\UI\API\Requests\Admin\LoginRequest;
use App\Containers\UserSection\Staff\Tasks\FindStaffByEmailTask;
use App\Ship\Core\Abstracts\Actions\Action;
use App\Ship\Exceptions\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;
use Throwable;

class LoginAction extends Action
{
    /**
     * @throws Throwable
     */
    public function handle(array $data): object
    {
        $staff = app(FindStaffByEmailTask::class)->execute($data['email']);
        $user = $staff->user;

        throw_if(! Hash::check($data['password'], $user->password), ModelNotFoundException::class);

        $token = $staff->createToken('PAT')->plainTextToken;

        return (object) [
            'access_token' => $token,
            'staff' => $user,
        ];
    }
}
