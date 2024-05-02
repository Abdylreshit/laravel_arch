<?php

namespace App\Containers\WarehouseSection\Product\Models;

use App\Containers\WarehouseSection\Category\Managers\Traits\Categorizable;
use App\Ship\Core\Abstracts\Models\Model;
use App\Ship\Core\Abstracts\Models\Traits\TranslateTrait;
use App\Ship\Core\Abstracts\Models\Traits\WithMediaTrait;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;

class Product extends Model implements HasMedia
{
    use Categorizable;
    use SoftDeletes;
    use TranslateTrait;
    use WithMediaTrait;

    protected $fillable = [
        'name',
        'description',
        'sku',
    ];

    protected $translatable = [
        'name',
        'description',
    ];

//    protected static function boot()
//    {
//        parent::boot();
//
//        static::created(function (Product $product) {
//            $product->sku = $product->id;
//            $product->save();
//        });
//    }

    //    public function registerMediaConversions(Media $media = null): void
    //    {
    //        $this->addMediaConversion('thumb')
    //            ->width(800)
    //            ->height(200)
    //            ->format('webp');
    //    }

    public function propertyValues(): BelongsToMany
    {
        return $this->belongsToMany(
            PropertyValue::class,
            'product_property_values',
            'product_id',
            'property_value_id',
            'id',
            'id'
        )
            ->withPivot('value');
    }

    public function barcodes(): HasMany
    {
        return $this->hasMany(Barcode::class);
    }
}
