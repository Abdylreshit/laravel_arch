<?php

namespace App\Containers\WarehouseSection\Product\Models;

use App\Containers\WarehouseSection\Product\Data\Factories\PropertyValueFactory;
use App\Ship\Core\Abstracts\Models\Model;
use App\Ship\Core\Abstracts\Models\Traits\TranslateTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyValue extends Model
{
    use SoftDeletes;
    use TranslateTrait;

    protected $table = 'property_values';

    protected $fillable = [
        'value'
    ];

    protected array $translatable = [
        'value'
    ];

    protected static function newFactory(): Factory
    {
        return PropertyValueFactory::new();
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(
            Product::class,
            'product_property_values',
            'property_value_id',
            'product_id',
            'id',
            'id'
        )
            ->withPivot('value');
    }
}
