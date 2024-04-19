<?php

namespace App\Containers\AuthenticationSection\Sanctum\UI\API\Controllers\Admin;

use App\Containers\AuthenticationSection\Sanctum\Actions\Admin\LoginAction;
use App\Containers\AuthenticationSection\Sanctum\UI\API\Requests\Admin\LoginRequest;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use App\Ship\Core\Resources\EnumResource;
use Illuminate\Http\JsonResponse;

final class LoginController extends ApiController
{
    public function __invoke(LoginRequest $request): JsonResponse
    {
        $result = LoginAction::run($request->toArray());

        return $this->successResponse([
            'access_token' => $result->access_token,
            'staff' => [
                'id' => $result->staff->id,
                'email' => $result->staff->email,
                'firstname' => $result->staff->firstname,
                'lastname' => $result->staff->lastname,
            ],
        ]);
    }
}
