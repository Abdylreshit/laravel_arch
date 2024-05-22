<?php

namespace App\Containers\UserSection\Staff\UI\API\Resources;

use App\Ship\Core\Abstracts\Resources\Resource;

class MainStaffResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'firstname' => $this->firstName,
            'lastname' => $this->lastName,
            'fullname' => $this->fullName,
            'email' => $this->email,
            'phone' => $this->phone,
            'is_blocked' => $this->isBlocked,
            'avatar' => $this->avatar,
        ];
    }
}
