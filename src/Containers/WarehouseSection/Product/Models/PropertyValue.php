<?php

namespace App\Containers\WarehouseSection\Product\Models;

use App\Containers\WarehouseSection\Product\Data\Factories\PropertyValueFactory;
use App\Containers\WarehouseSection\Product\Enums\PropertyType;
use App\Ship\Core\Abstracts\Models\Model;
use App\Ship\Core\Abstracts\Models\Traits\TranslateTrait;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertyValue extends Model
{
    use SoftDeletes;
    use TranslateTrait;

    protected $table = 'property_values';

    protected $fillable = [
        'name',

        'property_id',
        'text',
        'decimal',
        'integer',
        'boolean',
        'color',
    ];

    protected array $translatable = [
        'name',
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

    public function getValueAttribute()
    {
        return match ($this->property->type) {
            PropertyType::TEXT => null,
            PropertyType::DECIMAL => $this->decimal,
            PropertyType::INTEGER => $this->integer,
            PropertyType::BOOLEAN => $this->boolean,
            PropertyType::COLOR => $this->color,
        };
    }

    public function scopeWhereValue($query, $value)
    {
        return match ($this->property->type) {
            PropertyType::TEXT => $query->whereLocale('name', $value),
            PropertyType::DECIMAL => $query->where('decimal', $value),
            PropertyType::INTEGER => $query->where('integer', $value),
            PropertyType::BOOLEAN => $query->where('boolean', $value),
            PropertyType::COLOR => $query->where('color', $value),
        };
    }
}
