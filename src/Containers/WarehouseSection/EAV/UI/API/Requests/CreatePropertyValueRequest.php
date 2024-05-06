<?php

namespace App\Containers\WarehouseSection\EAV\UI\API\Requests;

use App\Ship\Core\Abstracts\Requests\Request;

class CreatePropertyValueRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => ['nullable', 'array'],
            'name.ru' => ['nullable', 'string'],
            'name.en' => ['nullable', 'string'],
            'value' => ['nullable'],
        ];
    }
}
