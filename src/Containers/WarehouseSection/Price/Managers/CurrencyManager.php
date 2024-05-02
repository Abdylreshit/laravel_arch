<?php

namespace App\Containers\WarehouseSection\Price\Managers;

class CurrencyManager
{
    private $currency;

    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    public function getCurrency()
    {
        return $this->currency ?? 'USD'; // По умолчанию USD
    }
}
