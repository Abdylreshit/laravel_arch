<?php

namespace App\Containers\AuthenticationSection\Sanctum\UI\API\Controllers\Admin;

use App\Containers\AuthenticationSection\Sanctum\Actions\Admin\LogoutAction;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class LogoutController extends ApiController
{
    public function __invoke(Request $request): JsonResponse
    {
        $staff = currentStaff();

        LogoutAction::run($staff);

        return $this->accepted('ok');
    }
}
