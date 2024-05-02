<?php

namespace App\Containers\WarehouseSection\Stock\Models;

use App\Containers\WarehouseSection\Product\Models\Product;
use App\Containers\WarehouseSection\Warehouse\Models\Warehouse;
use App\Ship\Core\Abstracts\Models\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stock extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'inventory_id',
        'warehouse_id',
        'quantity',
        'on_hand',
        'on_reserve',
    ];

    public function warehouse()
    {
        return $this->belongsTo(
            Warehouse::class,
            'warehouse_id',
            'id'
        );
    }

    public function product()
    {
        return $this->belongsTo(
            Product::class,
            'inventory_id',
            'id'
        );
    }

    public function stockMovements()
    {
        return $this->hasMany(
            StockMovement::class,
            'stock_id',
            'id'
        );
    }

    public function stockTransfers()
    {
        return $this->hasMany(
            StockTransfer::class,
            'stock_id',
            'id'
        );
    }

    public function stockSales()
    {
        return $this->hasMany(
            StockSale::class,
            'stock_id',
            'id'
        );
    }

    public function stockPurchases()
    {
        return $this->hasMany(
            StockPurchase::class,
            'stock_id',
            'id'
        );
    }
}
