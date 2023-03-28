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
        Schema::create('geolocations', function (Blueprint $table) {
            $table->id();
            $table->string('station_id');
            $table->string('country_id');
            $table->string('island');
            $table->string('county');
            $table->string('place');
            $table->string('hamlet');
            $table->string('town');
            $table->string('municipality');
            $table->string('state_district');
            $table->string('administrative');
            $table->string('state');
            $table->string('village');
            $table->string('region');
            $table->string('province');
            $table->string('city');
            $table->string('locality');
            $table->string('postalcode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('geolocations');
    }
};
