<?php

namespace App\Ship\Core\Resources;

use App\Ship\Core\Abstracts\Resources\Resource;
use Illuminate\Http\Request;

class MediaResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'small' => $this->getUrl('small'),
            'medium' => $this->getUrl('medium'),
            'large' => $this->getUrl('large'),
            'original' => $this->getUrl(),
        ];
    }
}
