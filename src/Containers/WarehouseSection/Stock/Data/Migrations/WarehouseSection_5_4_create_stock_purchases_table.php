<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stock_purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stock_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignId('movement_id')
                ->constrained('stock_movements')
                ->cascadeOnDelete();
            $table->foreignId('supplier_id')
                ->nullable()
                ->constrained('suppliers')
                ->nullOnDelete();

            $table->integer('quantity')->default(0);

            buildPriceColumn($table, 'unit_price');
            buildPriceColumn($table, 'total_price');
            buildDiscountColumns($table);
            buildPriceColumn($table, 'grand_total');
            buildPriceColumn($table, 'delivery_fee');

            $table->string('batch_code')->nullable();
            $table->timestamp('expired_at')->nullable();

            $table->text('note')->nullable();

            $table->foreignId('staff_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_purchases');
    }
};
