<?php

namespace App\Containers\AuthenticationSection\Sanctum\UI\API\Controllers\Admin;

use App\Containers\AuthenticationSection\Sanctum\Actions\Admin\LoginAction;
use App\Containers\AuthenticationSection\Sanctum\UI\API\Requests\Admin\LoginRequest;
use App\Ship\Core\Abstracts\Controllers\ApiController;

class LoginController extends ApiController
{
    public function __invoke(LoginRequest $request)
    {
        $result = LoginAction::run($request);

        return $this->successResponse($result);
    }
}
