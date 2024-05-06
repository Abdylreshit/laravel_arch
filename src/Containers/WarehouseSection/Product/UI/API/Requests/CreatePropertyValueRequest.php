<?php

namespace App\Containers\WarehouseSection\Product\UI\API\Requests;

use App\Ship\Core\Abstracts\Requests\Request;

class CreatePropertyValueRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'array'],
            'name.ru' => ['required', 'string', 'max:255'],
            'name.en' => ['required', 'string', 'max:255'],
            'value' => ['required', 'string', 'max:255'],
        ];
    }
}
