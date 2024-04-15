<?php

namespace App\Containers\WarehouseSection\Category\UI\API\Requests;

use App\Ship\Core\Abstracts\Requests\Request;

class CreateRequest extends Request
{
    public function rules(): array
    {
        if (config('category.image')) {
            return [
                'name' => ['required', 'array'],
                'name.ru' => ['required', 'string'],
                'name.en' => ['required', 'string'],
                'description' => ['nullable', 'array'],
                'description.ru' => ['nullable', 'string'],
                'description.en' => ['nullable', 'string'],
                'priority' => ['nullable', 'integer'],
                'parent_id' => ['nullable', 'integer'],

                'image' => ['nullable', 'image'],
            ];
        } else {
            return [
                'name' => ['required', 'array'],
                'name.ru' => ['required', 'string'],
                'name.en' => ['required', 'string'],
                'description' => ['nullable', 'array'],
                'description.ru' => ['nullable', 'string'],
                'description.en' => ['nullable', 'string'],
                'priority' => ['nullable', 'integer'],
                'parent_id' => ['nullable', 'integer'],
            ];
        }
    }
}
