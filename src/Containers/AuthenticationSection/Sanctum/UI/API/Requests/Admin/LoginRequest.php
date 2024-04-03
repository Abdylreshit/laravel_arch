<?php

namespace App\Containers\AuthenticationSection\Sanctum\UI\API\Requests\Admin;

use App\Ship\Core\Abstracts\Requests\Request;

class LoginRequest extends Request
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'min:3', 'max:20']
        ];
    }
}
