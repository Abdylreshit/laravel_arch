<?php

namespace App\Containers\WarehouseSection\Price\Models\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class PriceConvertCast implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes)
    {
        return json_decode($value, true);
    }

    public function set($model, string $key, $value, array $attributes)
    {
        return json_encode($value);
    }
}
