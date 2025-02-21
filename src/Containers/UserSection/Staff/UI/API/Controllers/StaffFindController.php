<?php

namespace App\Containers\UserSection\Staff\UI\API\Controllers;

use App\Containers\UserSection\Permission\UI\API\Resources\MainPermissionResource;
use App\Containers\UserSection\Permission\UI\API\Resources\MainRoleResource;
use App\Containers\UserSection\Staff\Actions\StaffFindAction;
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
                'roles' => MainRoleResource::collection($staff->roles),
                'permissions' => MainPermissionResource::collection($staff->permissions)
            ]
        ]);
    }
}
