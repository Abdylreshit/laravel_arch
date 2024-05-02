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
        Schema::create('currency_conversations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('from_currency_id')
                ->constrained('currencies')
                ->cascadeOnDelete();
            $table->foreignId('to_currency_id')
                ->constrained('currencies')
                ->cascadeOnDelete();
            $table->decimal('rate', 10, 4);
            $table->timestamp('valid_from')->nullable();
            $table->timestamp('valid_to')->nullable();
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('currency_conversations');
    }
};
