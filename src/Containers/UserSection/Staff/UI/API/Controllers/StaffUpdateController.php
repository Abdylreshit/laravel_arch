<?php

namespace App\Containers\UserSection\Staff\UI\API\Controllers;

use App\Containers\UserSection\Staff\Actions\StaffUpdateAction;
use App\Containers\UserSection\Staff\UI\API\Requests\StaffUpdateRequest;
use App\Containers\UserSection\Staff\UI\API\Resources\MainStaffResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;

final class StaffUpdateController extends ApiController
{
    public function __invoke(StaffUpdateRequest $request)
    {
        $staff = StaffUpdateAction::run(
            $request->id,
            $request->only('firstname', 'lastname', 'email', 'phone', 'password', 'avatar', 'is_blocked'),
            $request->roles ?? [],
        );

        return $this->successResponse([
            'staff' => new MainStaffResource($staff),
        ]);
    }
}
