<?php

namespace App\Containers\WarehouseSection\Price\UI\API\Requests;

use App\Ship\Core\Abstracts\Requests\Request;

class CreateCurrencyConversionRequest extends Request
{
    public function rules(): array
    {
        return [
            'rate' => ['required', 'numeric'],
            'valid_from' => ['required', 'date'],
            'valid_to' => ['required', 'date'],
            'is_active' => ['required', 'boolean'],
            'note' => ['nullable', 'string'],
        ];
    }
}
