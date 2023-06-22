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
        Schema::create('ship_part', function (Blueprint $table) {
            $table->unsignedBiginteger('parts_id')->unsigned();
            $table->unsignedBiginteger('ships_id')->unsigned();
            $table->integer('condition');

            $table->foreign('parts_id')->references('id')
                ->on('parts')->onDelete('cascade');
            $table->foreign('ships_id')->references('id')
                ->on('ships')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ship_part');
    }
};
