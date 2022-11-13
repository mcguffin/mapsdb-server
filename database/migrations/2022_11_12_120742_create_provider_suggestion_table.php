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
        Schema::create('map_service_provider_suggestions', function (Blueprint $table) {
            $table->id();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();

            // provider
            $table->string('provider_name', 255)->unique();
            $table->string('provider_slug', 255)->unique();
            $table->text('provider_description')->nullable();
            $table->string('provider_url', 255)->nullable();
            $table->longText('license_text')->nullable();
            $table->string('license_type', 32 )->nullable();

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
        Schema::dropIfExists('map_service_provider_suggestions');
    }
};
