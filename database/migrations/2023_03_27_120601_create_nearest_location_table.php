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
        Schema::create('nearest_location', function (Blueprint $table) {
            $table->id();
            $table->integer('station_id')->nullable(false);
            $table->integer('country_id')->nullable()->default(null);
            $table->string('name')->nullable()->default(null);
            $table->string('administrative_region1')->nullable()->default(null);
            $table->string('administrative_region2')->nullable()->default(null);
            $table->float('longitude')->nullable(false);
            $table->float('latitude')->nullable(false);
            $table->float('elevation')->nullable(false);
            $table->timestamps();

            $table->foreign('station_id')->references('id')->on('stations');
            $table->foreign('country_id')->references('id')->on('country');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nearest_location');
    }
};
