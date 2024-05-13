<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\UI\API\Requests;

use App\Ship\Core\Abstracts\Requests\Request;

class MeasurementCreateRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'array'],
            'name.ru' => ['required', 'string'],
            'name.en' => ['required', 'string'],
            'description' => ['nullable', 'array'],
            'description.ru' => ['nullable', 'string'],
            'description.en' => ['nullable', 'string'],
            'symbol' => ['required', 'string']
        ];
    }
}
