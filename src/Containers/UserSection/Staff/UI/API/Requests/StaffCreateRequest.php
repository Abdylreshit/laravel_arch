<?php

namespace App\Containers\UserSection\Staff\UI\API\Requests;

use App\Ship\Core\Abstracts\Requests\Request;

class StaffCreateRequest extends Request
{
    public function rules(): array
    {
        return [
            'firstname' => ['required', 'string'],
            'lastname' => ['nullable', 'string'],
            'email' => ['required', 'email'],
            'phone' => ['nullable', 'string'],
            'password' => ['required', 'string'],
            'avatar' => ['nullable', 'string'],
            'is_blocked' => ['nullable', 'boolean'],
            'roles' => ['required', 'array'],
            'roles.*' => ['required', 'integer', 'exists:roles,id'],
        ];
    }
}
