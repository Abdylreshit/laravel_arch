<?php

namespace App\Containers\WarehouseSection\Price\Managers\Traits;

use App\Containers\WarehouseSection\Price\Models\Price;

trait Pricable
{
    public function prices()
    {
        return $this->morphMany(Price::class, 'pricable');
    }

    public function actualPrice()
    {
        return $this
            ->morphOne(Price::class, 'pricable')
            ->where('is_active', true)
            ->where('valid_from', '<=', now())
            ->where('valid_to', '>=', now())
            ->latest('created_at');
    }
}
