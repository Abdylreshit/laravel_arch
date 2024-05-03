<?php

namespace App\Containers\WarehouseSection\Price\Models\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class PriceCast implements CastsAttributes
{
    /**
     * Преобразует значение атрибута из базы данных.
     *
     * @param  mixed  $value
     * @return array|null
     */
    public function get($model, $key, $value, $attributes)
    {
        if (empty($value)) {
            return null;
        }

        $data = json_decode($value, true);
        return [
            'price' => $data['price'] ?? null,
            'currency' => $data['currency'] ?? null,
        ];
    }

    /**
     * Преобразует значение атрибута в базу данных.
     *
     * @param  mixed  $value
     * @return string|null
     */
    public function set($model, $key, $value, $attributes)
    {
        if (empty($value['price']) || empty($value['currency'])) {
            return null;
        }

        return json_encode([
            'price' => $value['price'],
            'currency' => $value['currency'],
        ]);
    }
}
