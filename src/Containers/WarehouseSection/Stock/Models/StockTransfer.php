<?php

namespace App\Containers\WarehouseSection\Stock\Models;

use App\Containers\WarehouseSection\Price\Models\Casts\PriceCast;
use App\Containers\WarehouseSection\Price\Models\Currency;
use App\Containers\WarehouseSection\Stock\Enums\StockTransferStateEnum;
use App\Containers\WarehouseSection\Warehouse\Models\Warehouse;
use App\Ship\Core\Abstracts\Models\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockTransfer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'from_warehouse_id',
        'to_warehouse_id',
        'state',
        'note',
        'delivery_fee',
        'delivery_fee_currency_id',
    ];

    protected $casts = [
        'state' => StockTransferStateEnum::class,
        'delivery_fee' => PriceCast::class.':deliveryFeeCurrency',
    ];

    public function deliveryFeeCurrency()
    {
        return $this->belongsTo(
            Currency::class,
            'delivery_fee_currency_id',
            'id'
        );
    }

    public function fromWarehouse()
    {
        return $this->belongsTo(
            Warehouse::class,
            'from_warehouse_id',
            'id'
        );
    }

    public function toWarehouse()
    {
        return $this->belongsTo(
            Warehouse::class,
            'to_warehouse_id',
            'id'
        );
    }
}
