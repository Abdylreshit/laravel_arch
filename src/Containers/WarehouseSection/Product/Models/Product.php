<?php

namespace App\Containers\WarehouseSection\Product\Models;

use App\Containers\WarehouseSection\Category\Managers\Traits\Categorizable;
use App\Ship\Core\Abstracts\Models\Model;
use App\Ship\Core\Abstracts\Models\Traits\TranslateTrait;
use App\Ship\Core\Abstracts\Models\Traits\WithMediaTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;

class Product extends Model implements HasMedia
{
    use SoftDeletes;
    use TranslateTrait;
    use WithMediaTrait;
    use Categorizable;

    protected $fillable = [
        'name',
        'description'
    ];

//    public function registerMediaConversions(Media $media = null): void
//    {
//        $this->addMediaConversion('thumb')
//            ->width(800)
//            ->height(200)
//            ->format('webp');
//    }
}
