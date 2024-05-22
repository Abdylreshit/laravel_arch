<?php

namespace App\Containers\UserSection\Staff\UI\API\Controllers;

use App\Containers\UserSection\Staff\Actions\StaffFindAction;
use App\Containers\UserSection\Staff\UI\API\Resources\MainStaffResource;
use App\Ship\Core\Abstracts\Controllers\ApiController;
use Illuminate\Http\Request;

final class StaffFindController extends ApiController
{
    public function __invoke(Request $request)
    {
        $staff = StaffFindAction::run($request->id);

        return $this->successResponse([
            'staff' => [
                'id' => $staff->id,
                'user_id' => $staff->user_id,
                'firstname' => $staff->firstName,
                'lastname' => $staff->lastName,
                'fullname' => $staff->fullName,
                'email' => $staff->email,
                'phone' => $staff->phone,
                'is_blocked' => $staff->isBlocked,
                'avatar' => $staff->avatar,
                'roles' => $staff->roles->pluck('name')->toArray(),
                'permissions' => $staff->permissions->pluck('name')->toArray(),
            ]
        ]);
    }
}
