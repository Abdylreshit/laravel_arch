<?php

namespace App\Containers\WarehouseSection\Managers\UI\API\Requests;

use App\Ship\Core\Abstracts\Requests\Request;

class CreateTreeRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'parent_type' => ['nullable', 'string', 'in:CATEGORY,WAREHOUSE,REGION'],
            'parent_id' => ['nullable', 'integer'],
        ];
    }
}
