<?php

namespace App\Containers\WarehouseSection\Product\UI\API\Requests;

use App\Ship\Core\Abstracts\Requests\Request;

class CreateProductRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'array'],
            'name.ru' => ['required', 'string', 'max:255'],
            'name.en' => ['required', 'string', 'max:255'],
            'description' => ['required', 'array'],
            'description.ru' => ['required', 'string', 'max:255'],
            'description.en' => ['required', 'string', 'max:255'],
            'images' => ['required', 'array'],
            'images.*' => ['required', 'image', 'max:4096'],

            'property_values' => ['nullable', 'array'],
            'property_values.*' => ['nullable', 'integer', 'exists:property_values,id'],
        ];
    }
}
