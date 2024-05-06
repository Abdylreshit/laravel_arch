<?php

namespace App\Containers\WarehouseSection\Product\Models;

use App\Containers\WarehouseSection\Product\Data\Factories\PropertyFactory;
use App\Containers\WarehouseSection\Product\Enums\PropertyType;
use App\Ship\Core\Abstracts\Models\Model;
use App\Ship\Core\Abstracts\Models\Traits\TranslateTrait;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Property extends Model
{
    use SoftDeletes;
    use TranslateTrait;

    protected $table = 'properties';

    protected $fillable = [
        'name',
        'code',
        'type'
    ];

    protected $casts = [
        'type' => PropertyType::class,
    ];

    protected array $translatable = [
        'name',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function (Property $property) {
            $property->code = Str::upper(Str::random(5));
            $property->save();
        });
    }

    protected static function newFactory(): Factory
    {
        return PropertyFactory::new();
    }

    public function values(): HasMany
    {
        return $this->hasMany(PropertyValue::class, 'property_id', 'id');
    }

    public function isText(): bool
    {
        return $this->type === PropertyType::TEXT;
    }

    public function isDecimal(): bool
    {
        return $this->type === PropertyType::DECIMAL;
    }

    public function isInteger(): bool
    {
        return $this->type === PropertyType::INTEGER;
    }

    public function isBoolean(): bool
    {
        return $this->type === PropertyType::BOOLEAN;
    }

    public function isColor(): bool
    {
        return $this->type === PropertyType::COLOR;
    }

    public function isType(string $type): bool
    {
        return $this->type === $type;
    }
}
