<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\UI\API\Requests;

use App\Containers\WarehouseSection\MeasurementUnit\Enums\TypeEnum;
use App\Ship\Core\Abstracts\Requests\Request;
use BenSampo\Enum\Rules\EnumValue;

class CreateRequest extends Request
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
            'type' => ['required', new EnumValue(TypeEnum::class)],
            'symbol' => ['required', 'string'],
            'conversion_factor_to_base_unit' => ['required', 'numeric'],
        ];
    }
}
