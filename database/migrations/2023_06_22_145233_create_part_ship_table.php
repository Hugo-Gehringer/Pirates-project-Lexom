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
        Schema::create('part_ship', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parts_id')->constrained();
            $table->foreignId('ships_id')->constrained();
            $table->integer('condition');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('part_ship');
    }
};
