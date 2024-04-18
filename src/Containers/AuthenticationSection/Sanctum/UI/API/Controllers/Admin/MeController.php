<?php

namespace App\Containers\AuthenticationSection\Sanctum\UI\API\Controllers\Admin;

use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class MeController extends ApiController
{
    public function __invoke(Request $request): JsonResponse
    {
        $staff = currentStaff();

        return $this->successResponse([
            'staff' => [
                'id' => $staff->id,
                'fullname' => $staff->fullname,
                'email' => $staff->email,
                'roles' => $staff->roles->pluck('name'),
                'permissions' => $staff->permissions->pluck('name'),
            ]
        ]);
    }
}
