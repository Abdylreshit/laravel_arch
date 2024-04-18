<?php

namespace App\Containers\WarehouseSection\Warehouse\UI\API\Requests;

use App\Ship\Core\Abstracts\Requests\Request;

class UpdateRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'is_blocked' => ['required', 'boolean'],
        ];
    }
}
