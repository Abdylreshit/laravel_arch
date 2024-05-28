<?php

namespace App\Containers\WarehouseSection\Managers\Models\Traits;

use App\Containers\WarehouseSection\Price\Models\Price;
use App\Containers\WarehouseSection\Warehouse\Models\Warehouse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\DB;

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
            ->prices()
            ->where('is_active', true)
            ->where('valid_from', '<=', now())
            ->where('valid_to', '>=', now())
            ->orderByDesc('id');
    }

    /**
     * Get actual prices for warehouses
     *
     * @return MorphMany
     */
    public function actualPricesWarehouses()
    {
        $subquery = $this
            ->actualPrices()
            ->select([DB::raw('MAX(id) as id')])
            ->groupBy('warehouse_id');

        return $this
            ->actualPrices()
            ->whereIn('id', $subquery)
            ->orderByDesc('id');
    }

    /**
     * Get prices for specific warehouse
     *
     * @param Warehouse|int $warehouse
     * @return MorphMany
     */
    public function warehousePrices(Warehouse|int $warehouse): MorphMany
    {
        return $this->prices()
            ->where('warehouse_id', gettype($warehouse) === 'integer' ? $warehouse : $warehouse->id);
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

    /**
     * Get actual price for specific warehouse
     *
     * @param Warehouse|int $warehouse
     * @return Model|null
     */
    public function actualWarehousePrice(Warehouse|int $warehouse): Model|null
    {
        return $this
            ->actualPrices()
            ->where('warehouse_id', gettype($warehouse) === 'integer' ? $warehouse : $warehouse->id)
            ->first();
    }
}
