<?php

namespace App\Containers\WarehouseSection\Product\Models;

use App\Containers\WarehouseSection\Category\Managers\Traits\Categorizable;
use App\Containers\WarehouseSection\EAV\Managers\Traits\Propertiable;
use App\Containers\WarehouseSection\Managers\Models\Traits\Pricable;
use App\Containers\WarehouseSection\Product\Data\Factories\ProductFactory;
use App\Containers\WarehouseSection\Product\Enums\ProductType;
use App\Containers\WarehouseSection\Stock\Models\Stock;
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
    use Pricable;
//    use Stockable;

    protected $fillable = [
        'name',
        'description',
        'sku',
        'type',
        'specode',
        'specode2',
        'specode3',
        'specode4',
        'specode5',
        'specode6',
        'specode7',
        'specode8',
        'specode9',
    ];

    protected $translatable = [
        'name',
        'description',
    ];

    protected $casts = [
        'type' => ProductType::class,
    ];

//    protected $with = ['media', 'bundleItems', 'properties', 'propertyValues', 'bundleItems.media', 'bundleItems.properties', 'bundleItems.propertyValues'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->sku = uniqid();
        });
    }

    protected static function newFactory(): Factory
    {
        return ProductFactory::new();
    }

    public function barcodes(): HasMany
    {
        return $this->hasMany(Barcode::class);
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class, 'inventory_id', 'id');
    }

    public function bundle()
    {
        return $this
            ->belongsToMany(
                Product::class,
                'product_bundle_items',
                'item_id',
                'parent_id'
            )
            ->withPivot('quantity');
    }

    public function bundleItems()
    {
        return $this
            ->belongsToMany(
                Product::class,
                'product_bundle_items',
                'parent_id',
                'item_id'
            )
            ->withPivot('quantity');
    }
}
