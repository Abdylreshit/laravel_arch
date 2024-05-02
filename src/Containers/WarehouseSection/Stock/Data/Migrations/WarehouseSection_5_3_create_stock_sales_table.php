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
        Schema::create('stock_sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stock_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignId('movement_id')
                ->constrained('stock_movements')
                ->cascadeOnDelete();

            $table->integer('quantity')->default(0);

            buildPriceColumn($table, 'unit_price');
            buildPriceColumn($table, 'total_price');
            buildDiscountColumns($table);
            buildPriceColumn($table, 'delivery_fee');
            buildPriceColumn($table, 'grand_total');

            $table->nullableMorphs('receiver');

            $table->string('state');
            $table->timestamp('completed_at')->nullable();
            $table->timestamp('canceled_at')->nullable();
            $table->text('note')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_sales');
    }
};
