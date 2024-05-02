<?php

use Illuminate\Database\Schema\Blueprint;

if (! function_exists('buildPriceColumn')) {
    function buildPriceColumn(Blueprint $table, $column = 'price')
    {
        $table->double($column, '15', '2')->default(0);
        $table->foreignId($column . '_currency_id')
            ->constrained('currencies')
            ->cascadeOnDelete();
        $table->foreignId($column . '_currency_conversion_id')
            ->constrained('currency_conversations')
            ->cascadeOnDelete();
    }
}

if (! function_exists('buildDiscountColumns')) {
    function buildDiscountColumns(Blueprint $table)
    {
        $table->double('discount', '15', '2')->default(0);
        $table->double('discount_percentage', '15', '2')->default(0);
    }
}
