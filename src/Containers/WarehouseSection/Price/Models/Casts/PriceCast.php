<?php

namespace App\Containers\WarehouseSection\Price\Models\Casts;

use App\Containers\WarehouseSection\Price\Models\Currency;

class PriceCast
{
    protected $amount;
    protected $currency;
    protected $conversionCurrency;

    public function __construct($amount, Currency $conversionCurrency)
    {
        $this->amount = $amount;
        $this->currency = getBaseCurrency();
        $this->conversionCurrency = $conversionCurrency;
    }

    public function convertTo($targetCurrency)
    {
        $conversionRate = $this->getConversionRate($targetCurrency);

        if ($conversionRate === null) {
            return null;
        }

        return $this->amount * $conversionRate;
    }

    protected function getConversionRate($targetCurrency)
    {
        $conversionRate = $this->currency->conversionRates()
            ->where('target_currency_id', $targetCurrency)
            ->first();

        if ($conversionRate === null) {
            return null;
        }

        return $conversionRate->rate;
    }

    public function __get($property)
    {
        if ($property === 'amount') {
            return $this->amount;
        } elseif ($property === 'currency') {
            return $this->currency;
        }

        return null;
    }
}
