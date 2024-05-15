<?php

namespace App\Containers\WarehouseSection\Product\UI\API\Requests;

use App\Containers\WarehouseSection\Product\Enums\ProductType;
use App\Ship\Core\Abstracts\Requests\Request;
use BenSampo\Enum\Rules\EnumValue;

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

            'type' => ['required', new EnumValue(ProductType::class)],

            'items' => ['required_if:type,' . ProductType::BUNDLE, 'array'],
            'items.*.product_id' => ['required', 'integer', 'exists:products,id'],

            'property_values' => ['nullable', 'array'],
            'property_values.*' => ['nullable', 'integer', 'exists:property_values,id'],

            'categories' => ['nullable', 'array'],
            'categories.*' => ['nullable', 'integer', 'exists:categories,id'],
        ];
    }
}
