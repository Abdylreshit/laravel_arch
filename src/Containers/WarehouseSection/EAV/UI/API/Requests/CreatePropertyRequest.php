<?php

namespace App\Containers\WarehouseSection\EAV\UI\API\Requests;

use App\Containers\WarehouseSection\EAV\Enums\PropertyType;
use App\Ship\Core\Abstracts\Requests\Request;
use BenSampo\Enum\Rules\EnumValue;

class CreatePropertyRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'array'],
            'name.ru' => ['required', 'string', 'max:255'],
            'name.en' => ['required', 'string', 'max:255'],
            'type' => ['required', new EnumValue(PropertyType::class)],
        ];
    }
}
