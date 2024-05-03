<?php

namespace App\Containers\WarehouseSection\Price\Models\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class PriceCast implements CastsAttributes
{
    public function set($model, $key, $value, $attributes)
    {
        if (
            empty($value) ||
            empty($value['amount']) ||
            empty($value['currency_id']) ||
            empty($value['currency_conversion_id'])
        ) {
            return null;
        }

        return [
            $key => $value['amount'],
            $key . '_currency_id' => $value['currency_id'],
            $key . '_currency_conversion_id' => $value['currency_conversion_id']
        ];
    }

    public function get($model, string $key, mixed $value, array $attributes)
    {
        return [
            'amount' => $attributes[$key],
            'currency_id' => $attributes[$key . '_currency_id'],
            'currency_conversion_id' => $attributes[$key . '_currency_conversion_id']
        ];
    }
}
