<?php

namespace App\Containers\UserSection\Permission\UI\API\Resources;

use App\Ship\Core\Abstracts\Resources\Resource;

class MainRoleResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => [
                'en' => $this->getTrans('trans_names', 'en'),
                'ru' => $this->getTrans('trans_names', 'ru'),
            ],
            'value' => $this->name
        ];
    }
}
