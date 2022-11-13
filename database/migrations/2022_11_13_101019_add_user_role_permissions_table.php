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
        //
        Schema::create('user_role_permissions', function (Blueprint $table) {
            $table->id();

            $table->boolean('active');
            $table->string('permission_name', 64);

            // provider
            $table->foreignIdFor( 'App\Models\UserRole', 'role_id' )->references('id')->on('user_roles')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
