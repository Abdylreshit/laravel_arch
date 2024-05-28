<?php

namespace App\Containers\WarehouseSection\Product\Models;

use App\Containers\WarehouseSection\Product\Enums\BarcodeType;
use App\Ship\Core\Abstracts\Models\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Barcode extends Model
{
    protected $table = 'product_barcodes';

    protected $fillable = [
        'barcode',
    ];

    protected $casts = [
        'type' => BarcodeType::class,
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
