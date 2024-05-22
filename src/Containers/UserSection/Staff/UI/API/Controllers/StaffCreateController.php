<?php

namespace App\Containers\UserSection\Staff\UI\API\Controllers;

use App\Containers\UserSection\Staff\Actions\StaffCreateAction;
use App\Containers\UserSection\Staff\UI\API\Requests\StaffCreateRequest;
use App\Containers\UserSection\Staff\UI\API\Resources\MainStaffResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;

final class StaffCreateController extends ApiController
{
    public function __invoke(StaffCreateRequest $request)
    {
        $staff = StaffCreateAction::run(
            $request->only('firstname', 'lastname', 'email', 'phone', 'password', 'avatar', 'is_blocked'),
            $request->roles,
        );

        return $this->successResponse([
            'staff' => new MainStaffResource($staff),
        ]);
    }
}
