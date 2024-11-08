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
        Schema::create('sensors', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date')->nullable();
            $table->float('suhu_udara');
            $table->float('kelembaban_udara');
            $table->float('intensitas_cahaya');
            $table->float('ph_tanah');
            $table->float('suhu_tanah');
            $table->float('tds_tanah');
            $table->float('volume_nutrient');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sensors');
    }
};
