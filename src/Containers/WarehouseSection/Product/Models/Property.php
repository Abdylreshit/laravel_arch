<?php

namespace App\Containers\WarehouseSection\Product\Models;

use App\Containers\WarehouseSection\Product\Data\Factories\PropertyFactory;
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
        return $this->hasMany(PropertyValue::class);
    }
}
