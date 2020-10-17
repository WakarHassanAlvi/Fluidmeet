<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUsersRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->integer('id')->unsigned();
            $table->primary(['id', 'user_id', 'role_id']);//to make user_id and role_id unique
            $table->foreignId('user_id')->unsigned()->constrained()->OnDelete('cascade');//when a user is deleted, the role is also deleted
            $table->foreignId('role_id')->unsigned()->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        Schema::table('role_user', function (Blueprint $table) {
            $table->integer('id', true, true)->change();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_user');
    }
}
