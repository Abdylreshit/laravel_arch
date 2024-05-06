<?php

namespace App\Containers\WarehouseSection\Product\Models;

use App\Containers\WarehouseSection\Category\Managers\Traits\Categorizable;
use App\Containers\WarehouseSection\EAV\Managers\Traits\Propertiable;
use App\Containers\WarehouseSection\Product\Data\Factories\ProductFactory;
use App\Ship\Core\Abstracts\Models\Model;
use App\Ship\Core\Abstracts\Models\Traits\TranslateTrait;
use App\Ship\Core\Abstracts\Models\Traits\WithMediaTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Factories\Factory;

class Product extends Model implements HasMedia
{
    use SoftDeletes;
    use TranslateTrait;
    use WithMediaTrait;
    use Categorizable;
    use Propertiable;

    protected $fillable = [
        'name',
        'description',
        'sku',
    ];

    protected $translatable = [
        'name',
        'description',
    ];

    protected static function newFactory(): Factory
    {
        return ProductFactory::new();
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function (Product $product) {
            $product->sku = now()->format('Ymd'). '-' . $product->id;
            $product->save();
        });
    }

    //    public function registerMediaConversions(Media $media = null): void
    //    {
    //        $this->addMediaConversion('thumb')
    //            ->width(800)
    //            ->height(200)
    //            ->format('webp');
    //    }

    public function barcodes(): HasMany
    {
        return $this->hasMany(Barcode::class);
    }
}
