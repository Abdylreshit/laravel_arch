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
            $table->string('state');

            $table->foreignId('sender_id')
                ->constrained('staff')
                ->cascadeOnDelete();
            $table->foreignId('receiver_id')
                ->constrained('staff')
                ->cascadeOnDelete();

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
