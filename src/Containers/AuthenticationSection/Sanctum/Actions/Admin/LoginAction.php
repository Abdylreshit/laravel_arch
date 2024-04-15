<?php

namespace App\Containers\AuthenticationSection\Sanctum\Actions\Admin;

use App\Containers\AuthenticationSection\Sanctum\UI\API\Requests\Admin\LoginRequest;
use App\Containers\StaffSection\Staff\Tasks\FindByEmailStaffTask;
use App\Ship\Core\Abstracts\Actions\Action;
use App\Ship\Exceptions\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;
use Throwable;

class LoginAction extends Action
{
    /**
     * @throws Throwable
     */
    public function handle(LoginRequest $request): object
    {
        $staff = app(FindByEmailStaffTask::class)->execute($request->email);

        throw_if(! Hash::check($request->password, $staff->password), ModelNotFoundException::class);

        $token = $staff->createToken('PAT')->plainTextToken;

        return (object) [
            'access_token' => $token,
            'staff' => $staff,
        ];
    }
}
