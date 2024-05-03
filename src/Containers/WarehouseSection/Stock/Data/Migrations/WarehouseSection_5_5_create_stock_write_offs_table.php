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
        Schema::create('stock_write_offs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('stock_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('movement_id')
                ->constrained('stock_movements')
                ->cascadeOnDelete();

            $table->integer('quantity')->default(0);
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
        Schema::dropIfExists('stock_write_offs');
    }
};
