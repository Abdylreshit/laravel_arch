<?php

namespace App\Containers\WarehouseSection\Product\UI\API\Requests;

use App\Containers\WarehouseSection\Product\Enums\ProductType;
use App\Ship\Core\Abstracts\Requests\Request;
use BenSampo\Enum\Rules\EnumValue;

class UpdateProductRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'array'],
            'name.ru' => ['required', 'string', 'max:255'],
            'name.en' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'array'],
            'description.ru' => ['nullable', 'string', 'max:255'],
            'description.en' => ['nullable', 'string', 'max:255'],
            'images' => ['nullable', 'array'],
            'images.*' => ['nullable', 'image', 'max:4096'],

            'property_values' => ['nullable', 'array'],
            'property_values.*' => ['nullable', 'integer', 'exists:property_values,id'],

            'categories' => ['nullable', 'array'],
            'categories.*' => ['nullable', 'integer', 'exists:categories,id'],
        ];
    }
}
