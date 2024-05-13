<?php

namespace App\Containers\WarehouseSection\MeasurementUnit\Models;

use App\Ship\Core\Abstracts\Models\Model;
use App\Ship\Core\Abstracts\Models\Traits\TranslateTrait;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Containers\WarehouseSection\MeasurementUnit\Data\Factories\MeasurementFactory;

class Measurement extends Model
{
    use SoftDeletes;
    use TranslateTrait;

    protected $fillable = [
        'name',
        'description',
    ];

    public $translatable = [
        'name',
        'description',
    ];

    protected static function newFactory(): Factory|MeasurementFactory
    {
        return MeasurementFactory::new();
    }

    public function units()
    {
        return $this->hasMany(MeasurementUnit::class);
    }
}
