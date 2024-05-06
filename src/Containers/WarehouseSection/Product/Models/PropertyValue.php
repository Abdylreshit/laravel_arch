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
        if ($this->property->isText()) {
            return null;
        }

        if ($this->property->isDecimal()) {
            return $this->decimal;
        }

        if ($this->property->isInteger()) {
            return $this->integer;
        }

        if ($this->property->isBoolean()) {
            return $this->boolean;
        }

        if ($this->property->isColor()) {
            return $this->color;
        }

        return null;
    }

    public function scopeWhereValue($query, $value, string $operator = '=')
    {
        if ($this->property->isText()) {
            return $query->whereLocale('name', "%$value%");
        }

        if ($this->property->isDecimal()) {
            return $query->where('decimal', $operator,$value);
        }

        if ($this->property->isInteger()) {
            return $query->where('integer',$operator, $value);
        }

        if ($this->property->isBoolean()) {
            return $query->where('boolean',$operator, $value);
        }

        if ($this->property->isColor()) {
            return $query->where('color', $operator, $value);
        }

        return $query;
    }
}
