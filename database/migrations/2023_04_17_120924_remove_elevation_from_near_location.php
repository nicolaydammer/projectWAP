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
        Schema::table('nearest_locations', function (Blueprint $table) {
            $table->dropColumn('elevation');
            $table->dropColumn('country_id');
        });

        Schema::table('nearest_locations', function (Blueprint $table) {
            $table->char('country_id', 2)->after('station_id');
        });
    }
};
