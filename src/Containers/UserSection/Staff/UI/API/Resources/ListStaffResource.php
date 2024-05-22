<?php

namespace App\Containers\UserSection\Staff\UI\API\Resources;

use App\Containers\UserSection\Permission\UI\API\Resources\MainRoleResource;
use App\Ship\Core\Abstracts\Resources\ResourceCollection;

class ListStaffResource extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function ($staff) {
                return [
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
                ];
            }),
            'pagination' => $this->paginationResource(),
        ];
    }
}
