<?php

namespace App\Containers\WarehouseSection\Managers\UI\API\Requests;

use App\Ship\Core\Abstracts\Requests\Request;

class DeleteTreeRequest extends Request
{
    public function rules(): array
    {
        return [
            'id' => ['required', 'integer'],
            'model' => ['required', 'string', 'in:CATEGORY,WAREHOUSE,REGION'],
        ];
    }
}
