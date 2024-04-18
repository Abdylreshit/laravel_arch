<?php

use App\Containers\UserSection\User\Enums\StatusEnum;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname')->nullable();
            $table->string('email')->unique()->index();
            $table->string('password');
            $table->string('phone')->nullable()->unique();
            $table->string('timezone')->default(config('app.timezone'));

            $table->boolean('is_blocked')->default(false);
            $table->string('status')->default(StatusEnum::DO_NOT_DISTURB);
            $table->string('locale')->default(app()->getLocale());

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
