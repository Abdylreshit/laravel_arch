<?php

namespace App\Containers\WarehouseSection\Stock\Models;

use App\Containers\WarehouseSection\Stock\Enums\MovementTypeEnum;
use App\Ship\Core\Abstracts\Models\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockMovement extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'stock_id',
        'before',
        'after',
        'type',
    ];

    protected $casts = [
        'type' => MovementTypeEnum::class,
    ];

    public function stock()
    {
        return $this->belongsTo(
            Stock::class,
            'stock_id',
            'id'
        );
    }

    public function stockTransfer()
    {
        return $this->hasOne(
            StockTransfer::class,
            'movement_id',
            'id'
        );
    }
}
