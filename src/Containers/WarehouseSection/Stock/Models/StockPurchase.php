<?php

namespace App\Containers\WarehouseSection\Stock\Models;

use App\Containers\UserSection\Staff\Models\Staff;
use App\Containers\WarehouseSection\Stock\Enums\StockPurchaseStateEnum;
use App\Containers\WarehouseSection\Supplier\Models\Supplier;
use App\Ship\Core\Abstracts\Models\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockPurchase extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "created_by",
        "state",
        "note",
        "supplier_id"
    ];

    protected $casts = [
        'state' => StockPurchaseStateEnum::class,
    ];

    public function createdBy()
    {
        return $this->belongsTo(Staff::class, 'created_by');
    }

    public function stockPurchaseItems()
    {
        return $this->hasMany(StockPurchaseItem::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
