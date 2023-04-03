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
        Schema::create('wheather_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('station_id');
            $table->dateTime('date_time');
            $table->float('temperature');
            $table->float('dewpoint');
            $table->float('standard_pressure');
            $table->float('sea_level_pressure');
            $table->float('visibility');
            $table->float('wind_speed');
            $table->float('precipation');
            $table->float('snow_depth');
            $table->float('humidity');
            $table->float('cloud_cover');
            $table->bigInteger('wind_direction');
            $table->string('events');
            $table->timestamps();

            $table->foreign('station_id')->references('id')->on('stations');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wheather_data');
    }
};
