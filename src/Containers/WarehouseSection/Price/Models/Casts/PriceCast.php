<?php

namespace App\Containers\WarehouseSection\Price\Models\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class PriceCast implements CastsAttributes
{
    public function __construct(
        protected string|null $currencyMethodName = null,
    ) {}

    public function get($model, string $key, $value, array $attributes)
    {
        $currency = $model->{$this->currencyMethodName};

        return new PriceType($value, $currency);
    }

    public function set($model, string $key, $value, array $attributes)
    {
        return [
            $key => $value
        ];
    }
}
