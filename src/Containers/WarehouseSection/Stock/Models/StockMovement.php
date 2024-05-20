<?php

namespace App\Containers\WarehouseSection\Stock\Models;

use App\Ship\Core\Abstracts\Models\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockMovement extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'stock_id',
        'before',
        'after',
        'movable_id',
        'movable_type',
    ];

    public function stock()
    {
        return $this->belongsTo(
            Stock::class,
            'stock_id',
            'id'
        );
    }

    public function movable()
    {
        return $this->morphTo();
    }
}
