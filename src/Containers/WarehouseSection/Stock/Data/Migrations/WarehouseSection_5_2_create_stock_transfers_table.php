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
        Schema::create('stock_transfers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('from_warehouse_id')
                ->constrained('warehouses')
                ->cascadeOnDelete();
            $table->foreignId('to_warehouse_id')
                ->constrained('warehouses')
                ->cascadeOnDelete();

            $table->foreignId('movement_id')
                ->constrained('stock_movements')
                ->cascadeOnDelete();

            $table->integer('quantity')->default(0);

            // type => in, out
            $table->string('type');

            // state => pending, accepted, rejected, canceled
            $table->string('state');

            buildPriceColumn($table, 'delivery_fee');

            $table->timestamp('accepted_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamp('canceled_at')->nullable();
            $table->text('note')->nullable();

            $table->foreignId('sender_id')
                ->constrained('staff')
                ->cascadeOnDelete();
            $table->foreignId('receiver_id')
                ->constrained('staff')
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
        Schema::dropIfExists('stock_transfers');
    }
};
