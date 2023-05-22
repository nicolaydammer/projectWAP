<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('customers', function (Blueprint $blueprint) {
            $blueprint->string('api_token')->nullable()->after('customerable_id');
        });

        Schema::table('contract_specifications', function (Blueprint $blueprint) {
            $blueprint->integer('country_id')->nullable()->change();
            $blueprint->double('latitude', 8, 2)->nullable()->change();
            $blueprint->double('longitude', 8, 2)->nullable()->change();
            $blueprint->json('Data_specifications')->nullable(false)->change();
            $blueprint->char('timezone', 6)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
