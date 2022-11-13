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
        Schema::create('map_tile_service_suggestions', function (Blueprint $table) {
            $table->id();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();

            // from map_service_providers
            // the actual provider
            $table->foreignIdFor( 'App\Models\MapServiceProvider', 'provider_id' )->references('id')->on('map_service_providers');

            // or a provider suggestion
            $table->foreignIdFor( 'App\Models\MapServiceProviderSuggestion', 'provider_suggestion_id' )->references('id')->on('map_service_provider_suggestions')->cascadeOnDelete();

            // same for all services
            $table->string( 'service_name', 255 );
            $table->string( 'service_slug', 255 );
            $table->text('provider_description')->nullable();
            $table->string( 'service_tile_format', 32 )->nullable(); // mapbox|leaflet|...
            $table->string( 'service_status', 16 )->default( 'suggestion' ); // down|dead|live
            $table->string( 'service_api_schema', 16 )->nullable(); // http|https|...
            $table->string( 'service_api_host', 255 )->nullable(); // just a hostname!
            $table->string( 'service_api_path', 255 )->nullable(); // path with placeholders! No GET Params!

            // tile service specific
            $table->tinyInteger( 'max_zoom', false, true )->unsigned()->nullable();
            $table->tinyInteger( 'min_zoom', false, true )->unsigned()->nullable();
            $table->tinyInteger( 'zoom_offset' )->nullable();

            $table->boolean( 'is_transparent' )->default( 0 ); //
            $table->boolean( 'is_inverse_y' )->default( 0 ); //
            $table->boolean( 'is_inverse_z' )->default( 0 ); //

            $table->text( 'attribution' )->nullable(); // 65.535 chars

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
        Schema::dropIfExists('map_tile_service_suggestions');
    }
};
