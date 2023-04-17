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
        Schema::create('contract_specifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id');
            $table->foreignId('contract_id');
            $table->char('timezone', 6);
            $table->float('latitude');
            $table->float('longitude');
            $table->json('Data_specifications');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contract_specifications');
    }
};
