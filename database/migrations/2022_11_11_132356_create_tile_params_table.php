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
        Schema::create('map_tile_service_params', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor( 'App\Models\MapTileService', 'service_id' )->references('id')->on('map_tile_services')->cascadeOnDelete();
            $table->string( 'param_name', 32 )->index('param_name'); // reserved: s,r,x,y,z
            $table->string( 'param_type', 32 )->default('string')->index('param_type');
            $table->text( 'param_value' ); // 64KiB
            $table->mediumText( 'param_description' )->nullable(); // documentation. < 16MiB

            $table->unique( [ 'service_id', 'param_name' ], 'service_param' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('map_tile_service_params');
    }
};
