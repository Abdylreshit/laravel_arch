<?php

namespace App\Containers\WarehouseSection\Managers\Models\Traits;

use App\Containers\WarehouseSection\Price\Models\Price;
use App\Containers\WarehouseSection\Warehouse\Models\Warehouse;

trait Pricable
{
    public function prices()
    {
        return $this->morphMany(Price::class, 'priceable');
    }

    public function actualPrices()
    {
        return $this
            ->morphMany(Price::class, 'priceable')
            ->where('is_active', true)
            ->where('valid_from', '<=', now())
            ->where('valid_to', '>=', now())
            ->distinct('warehouse_id');
    }

    public function warehousePrices(Warehouse|int $warehouse)
    {
        return $this->prices()->where('warehouse_id', gettype($warehouse) === 'integer' ? $warehouse : $warehouse->id);
    }

    public function actualWarehousePrices(Warehouse|int $warehouse)
    {
        return $this->actualPrices()->where('warehouse_id', gettype($warehouse) === 'integer' ? $warehouse : $warehouse->id);
    }
}
