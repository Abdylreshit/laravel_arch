<?php

namespace App\Containers\WarehouseSection\Stock\Models;

use App\Containers\UserSection\Staff\Models\Staff;
use App\Containers\WarehouseSection\Stock\Enums\TransferStateEnum;
use App\Containers\WarehouseSection\Stock\Enums\TransferTypeEnum;
use App\Containers\WarehouseSection\Warehouse\Models\Warehouse;
use App\Ship\Core\Abstracts\Models\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockTransfer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'from_warehouse_id',
        'to_warehouse_id',
        'stock_id',
        'movement_id',
        'quantity',
        'type',
        'state',
        'completed_at',
        'canceled_at',
        'sender_id',
        'receiver_id',
    ];

    protected $casts = [
        'type' => TransferTypeEnum::class,
        'state' => TransferStateEnum::class,
    ];

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

    public function stock()
    {
        return $this->belongsTo(
            Stock::class,
            'stock_id',
            'id'
        );
    }

    public function movement()
    {
        return $this->belongsTo(
            StockMovement::class,
            'movement_id',
            'id'
        );
    }

    public function sender()
    {
        return $this->belongsTo(
            Staff::class,
            'sender_id',
            'id'
        )->withTrashed();
    }

    public function receiver()
    {
        return $this->belongsTo(
            Staff::class,
            'receiver_id',
            'id'
        )->withTrashed();
    }
}
