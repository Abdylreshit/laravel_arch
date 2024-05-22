<?php

namespace App\Containers\UserSection\Permission\UI\API\Requests;

use App\Ship\Core\Abstracts\Requests\Request;

class RoleUpdateRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'array'],
            'name.ru' => ['required', 'string'],
            'name.en' => ['required', 'string'],
            'permissions' => ['array'],
            'permissions.*' => ['integer', 'exists:permissions,id'],
        ];
    }
}
