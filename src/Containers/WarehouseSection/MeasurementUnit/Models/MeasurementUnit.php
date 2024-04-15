<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Models;

use App\Containers\WarehouseSection\MeasurementUnit\Data\Factories\MeasurementUnitFactory;
use App\Containers\WarehouseSection\MeasurementUnit\Enums\TypeEnum;
use App\Ship\Core\Abstracts\Models\Model;
use App\Ship\Core\Abstracts\Models\Traits\TranslateTrait;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class MeasurementUnit extends Model
{
    use SoftDeletes;
    use TranslateTrait;

    protected $fillable = [
        'name',
        'description',
        'type',
        'symbol',
        'conversion_factor_to_base_unit',
        'code',
    ];

    protected $casts = [
        'type' => TypeEnum::class,
    ];

    public $translatable = [
        'name',
        'description',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->code = Str::upper(Str::slug($model->symbol));
        });
    }

    protected static function newFactory(): Factory|MeasurementUnitFactory
    {
        return MeasurementUnitFactory::new();
    }
}
