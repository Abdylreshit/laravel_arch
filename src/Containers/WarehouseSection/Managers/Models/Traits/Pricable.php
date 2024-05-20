<?php

namespace App\Containers\WarehouseSection\Managers\Models\Traits;

use App\Containers\WarehouseSection\Price\Models\Price;
use App\Containers\WarehouseSection\Warehouse\Models\Warehouse;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait Pricable
{
    /**
     * Get prices
     *
     * @return MorphMany
     */
    public function prices()
    {
        return $this->morphMany(Price::class, 'priceable');
    }

    /**
     * Get actual prices
     *
     * @return MorphMany
     */
    public function actualPrices()
    {
        return $this
            ->morphMany(Price::class, 'priceable')
            ->where('is_active', true)
            ->where('valid_from', '<=', now())
            ->where('valid_to', '>=', now())
            ->distinct('warehouse_id');
    }

    /**
     * Get prices for specific warehouse
     *
     * @param Warehouse|int $warehouse
     * @return MorphMany
     */
    public function warehousePrices(Warehouse|int $warehouse): MorphMany
    {
        return $this->prices()->where('warehouse_id', gettype($warehouse) === 'integer' ? $warehouse : $warehouse->id);
    }

    /**
     * Get actual prices for specific warehouse
     *
     * @param Warehouse|int $warehouse
     * @return MorphMany
     */
    public function actualWarehousePrices(Warehouse|int $warehouse): MorphMany
    {
        return $this->actualPrices()
            ->where('warehouse_id', gettype($warehouse) === 'integer' ? $warehouse : $warehouse->id);
    }
}
