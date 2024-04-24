<?php

namespace App\Containers\WarehouseSection\Warehouse\Models;

use App\Containers\WarehouseSection\Category\Models\Category;
use App\Containers\WarehouseSection\Warehouse\Data\Factories\WarehouseFactory;
use App\Ship\Core\Abstracts\Models\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Warehouse extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'code',
        'is_blocked',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->code = Str::random(10);
        });
    }

    protected static function newFactory()
    {
        return WarehouseFactory::new();
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'warehouse_id', 'id');
    }
}
