<?php

namespace App\Containers\WarehouseSection\Stock\Models;

use App\Containers\WarehouseSection\Price\Models\Casts\PriceCast;
use App\Containers\WarehouseSection\Price\Models\Currency;
use App\Ship\Core\Abstracts\Models\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockPurchaseItem extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'stock_purchase_id',
        'stock_id',
        'movement_id',
        'quantity',
        'purchase_price',
        'purchase_price_currency_id'
    ];

    protected $casts = [
        'purchase_price' => PriceCast::class.':currency',
    ];

    public function currency()
    {
        return $this->belongsTo(
            Currency::class,
            'purchase_price_currency_id',
            'id'
        );
    }

    public function stockPurchase()
    {
        return $this->belongsTo(StockPurchase::class);
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }

    public function movement()
    {
        return $this->belongsTo(StockMovement::class);
    }
}
