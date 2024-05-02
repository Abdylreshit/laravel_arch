<?php

namespace App\Containers\WarehouseSection\Product\UI\API\Requests;

use App\Ship\Core\Abstracts\Requests\Request;

class CreatePropertyValueRequest extends Request
{
    public function rules(): array
    {
        return [
            'value' => ['required', 'array'],
            'value.ru' => ['required', 'string', 'max:255'],
            'value.en' => ['required', 'string', 'max:255'],
        ];
    }
}
