<?php

use App\Containers\WarehouseSection\Discount\Enums\DiscountType;
use App\Containers\WarehouseSection\Price\Tasks\FindCurrencyByCodeTask;
use Illuminate\Database\Schema\Blueprint;

if (! function_exists('buildPriceColumn')) {
    function buildPriceColumn(Blueprint $table, $column = 'price'): void
    {
        $table->double($column, '15', '2')->default(0);
        $table->foreignId($column . '_currency_id')
            ->constrained('currencies')
            ->cascadeOnDelete();
    }
}

if (! function_exists('buildDiscountColumns')) {
    function buildDiscountColumns(Blueprint $table): void
    {
        $table->double('discount', '15', '2')->default(0);
        $table->string('discount_type')->default(DiscountType::PERCENTAGE);
        $table->foreignId('discount_currency_id')
            ->nullable()
            ->constrained('currencies')
            ->nullOnDelete();
    }
}

if (! function_exists('getBaseCurrency')) {
    function getBaseCurrency()
    {
        $code = config('currency.base');

        return app(FindCurrencyByCodeTask::class)->execute($code);
    }
}
