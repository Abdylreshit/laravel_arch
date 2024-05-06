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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->string('code')->nullable()->unique();
            // type = TEXT, INTEGER, BOOLEAN, COLOR, DECIMAL
            $table->string('type')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });



        Schema::create('property_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->cascadeOnDelete();

            $table->json('name')
                ->nullable();

            $table->text('text')->nullable();
            $table->decimal('decimal', 10, 2)->nullable();
            $table->integer('integer')->nullable();
            $table->boolean('boolean')->nullable();
            $table->string('color')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('entity_property_values', function (Blueprint $table) {
            $table->foreignId('property_value_id')
                ->constrained('property_values')
                ->cascadeOnDelete();
            $table->morphs('entity');

            $table->unique(['entity_id', 'entity_type', 'property_value_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
        Schema::dropIfExists('property_values');
        Schema::dropIfExists('products_property_values');

    }
};
