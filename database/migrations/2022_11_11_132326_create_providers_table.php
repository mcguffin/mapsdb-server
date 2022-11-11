<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('map_service_providers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('provider_name', 255)->nullable()->unique();
            $table->text('provider_description')->nullable();
            $table->string('provider_url', 255)->nullable();
            $table->longText('license_text')->nullable();
            $table->string('license_type', 32 )->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('map_service_providers');
    }
};
