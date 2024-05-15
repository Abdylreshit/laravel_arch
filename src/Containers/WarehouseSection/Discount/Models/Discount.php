<?php

namespace App\Containers\WarehouseSection\Discount\Models;

use App\Containers\WarehouseSection\Discount\Data\Factories\DiscountFactory;
use App\Containers\WarehouseSection\Discount\Enums\DiscountType;
use App\Ship\Core\Abstracts\Models\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'amount',
        'type',
        'currency_id',
        'discountable_id',
        'discountable_type',
        'start_date',
        'end_date'
    ];

    protected $casts = [
        'type' => DiscountType::class,
    ];

    protected static function newFactory()
    {
        return DiscountFactory::new();
    }

    public function discountable()
    {
        return $this->morphTo();
    }
}
