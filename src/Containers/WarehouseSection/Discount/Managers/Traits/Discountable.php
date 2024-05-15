<?php

namespace App\Containers\WarehouseSection\Discount\Managers\Traits;

use App\Containers\WarehouseSection\Discount\Models\Discount;

trait Discountable
{
    public function discounts()
    {
        return $this->morphMany(Discount::class, 'discountable');
    }

    public function actualDiscounts()
    {
        return $this
            ->morphMany(Discount::class, 'discountable')
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now());
    }
}
