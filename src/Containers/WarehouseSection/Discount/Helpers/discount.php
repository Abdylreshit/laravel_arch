<?php

use App\Containers\WarehouseSection\Discount\Enums\DiscountType;
use Illuminate\Database\Schema\Blueprint;

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
