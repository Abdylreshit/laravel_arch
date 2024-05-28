<?php

use App\Containers\WarehouseSection\Product\Enums\ProductType;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->json('description')->nullable();
            $table->string('sku')->nullable()->unique();

            // types = configurable, simple, bundle, virtual
            $table->string('type')->default(ProductType::SIMPLE);
            $table->string('specode')->nullable();
            $table->string('specode2')->nullable();
            $table->string('specode3')->nullable();
            $table->string('specode4')->nullable();
            $table->string('specode5')->nullable();
            $table->string('specode6')->nullable();
            $table->string('specode7')->nullable();
            $table->string('specode8')->nullable();
            $table->string('specode9')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
