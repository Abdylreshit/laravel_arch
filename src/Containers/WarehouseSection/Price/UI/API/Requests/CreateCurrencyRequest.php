<?php

namespace App\Containers\WarehouseSection\Price\UI\API\Requests;

use App\Ship\Core\Abstracts\Requests\Request;

class CreateCurrencyRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'array'],
            'name.ru' => ['required', 'string', 'max:255'],
            'name.en' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'max:5'],
            'symbol' => ['required', 'string', 'max:5'],
        ];
    }
}
