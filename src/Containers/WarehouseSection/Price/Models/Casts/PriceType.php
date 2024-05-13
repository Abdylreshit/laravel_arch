<?php

namespace App\Containers\WarehouseSection\Price\Models\Casts;

use App\Containers\WarehouseSection\Price\Tasks\FindCurrencyByCodeTask;

class PriceType
{
    private $value;
    private $currency;

    public function __construct($value, $currency)
    {
        $this->value = (float)$value;
        $this->currency = $currency ?? getBaseCurrency();
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __toString()
    {
        return $this->value . ' ' . $this->currency->symbol;
    }

    public function getPrice()
    {
        return $this->value;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function getCurrencyCode()
    {
        return $this->currency->code;
    }

    public function convertTo($currencyCode = null, $model = null)
    {
        $currencyCode = $currencyCode ?? app('currency')->getCurrency();
        $convertToCurrency = app(FindCurrencyByCodeTask::class)->execute($currencyCode);

        $currencyConversion = $this->currency
            ->actualConversion($model ? $model->created_at : null, $model ? $model->created_at : null);
        $convertCurrencyConversion = $convertToCurrency
            ->actualConversion($model ? $model->created_at : null, $model ? $model->created_at : null)->rate;

        $convertToBaseCurrency = $this->value / (float)$currencyConversion->rate;
        $convertedValue = $convertToBaseCurrency * (float)$convertCurrencyConversion;

        return new PriceType(round($convertedValue, 2), $convertToCurrency);
    }
}
