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
        Schema::create('elans', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('title');
            $table->string('price');
            $table->integer('city_id');
            $table->text('description')->nullable();
            $table->string('activate')->default('waiting'); // active, passive, waiting, blocked
            $table->integer('status')->default('1'); // 1 => simple, 2 => premium, 3 => vip
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elans');
    }
};
