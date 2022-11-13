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
        Schema::create('map_tile_service_param_suggestions', function (Blueprint $table) {
            $table->id();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();

            $table->foreignIdFor( 'App\Models\MapTileService', 'service_id' )->references('id')->on('map_tile_service_suggestions')->cascadeOnDelete();
            $table->string( 'param_name', 32 )->index('param_name'); // reserved: s,r,x,y,z
            $table->string( 'param_type', 32 )->default('string')->index('param_type');
            $table->text( 'param_value' ); // 64KiB
            $table->mediumText( 'param_description' )->nullable(); // documentation. < 16MiB

            $table->unique( [ 'service_id', 'param_name' ], 'service_param' );

            // suggested by
            // we want suggestions to be deleted with user data
            $table->foreignIdFor( 'App\Models\User', 'owner' )->references('id')->on('users')->cascadeOnDelete();
            $table->text( 'suggestion_comment' ); // 64KiB
            $table->string( 'suggestion_status', 32 )->index('suggestion_status'); // reserved: s,r,x,y,z

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('map_tile_service_param_suggestions');
    }
};
