<?php

namespace App\Ship\Core\Resources;

use App\Ship\Core\Abstracts\Resources\Resource;
use Illuminate\Http\Request;

class EnumResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'key' => $this->key,
            'value' => $this->value,
            'description' => $this->description,
        ];
    }
}
