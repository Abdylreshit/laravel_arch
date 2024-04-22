<?php

namespace App\Containers\WarehouseSection\Category\UI\API\Requests;

use App\Ship\Core\Abstracts\Requests\Request;

class MoveRequest extends Request
{
    public function rules(): array
    {
        return [
            'id' => ['required', 'integer', 'exists:categories,id'],
            'parent_id' => ['nullable', 'integer', 'exists:categories,id'],
            'priority' => ['required', 'integer']
        ];
    }
}
