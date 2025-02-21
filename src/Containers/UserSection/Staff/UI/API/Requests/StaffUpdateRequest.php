<?php

namespace App\Containers\UserSection\Staff\UI\API\Requests;

use App\Ship\Core\Abstracts\Requests\Request;

class StaffUpdateRequest extends Request
{
    public function rules(): array
    {
        return [
            'firstname' => ['required', 'string'],
            'lastname' => ['nullable', 'string'],
            'email' => ['required', 'email'],
            'phone' => ['nullable', 'string'],
            'password' => ['nullable', 'string'],
            'avatar' => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif', 'max:2048'],
            'is_blocked' => ['nullable', 'boolean'],
            'roles' => ['nullable', 'array'],
            'roles.*' => ['nullable', 'integer', 'exists:roles,id'],
        ];
    }
}
