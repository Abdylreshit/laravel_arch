<?php

namespace App\Containers\WarehouseSection\Supplier\UI\API\Requests;

use App\Ship\Core\Abstracts\Requests\Request;

class CreateRequest extends Request
{
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['nullable', 'email'],
            'phone' => ['nullable', 'string'],
            'note' => ['nullable', 'string'],
        ];
    }
}
