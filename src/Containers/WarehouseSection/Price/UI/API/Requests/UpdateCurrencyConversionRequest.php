<?php

namespace App\Containers\WarehouseSection\Price\UI\API\Requests;

use App\Ship\Core\Abstracts\Requests\Request;

class UpdateCurrencyConversionRequest extends Request
{
    public function rules(): array
    {
        return [
            'rate' => ['required', 'numeric'],
            'valid_from' => ['nullable', 'date'],
            'valid_to' => ['nullable', 'date'],
            'is_active' => ['nullable', 'boolean'],
            'note' => ['nullable', 'string'],
        ];
    }
}
