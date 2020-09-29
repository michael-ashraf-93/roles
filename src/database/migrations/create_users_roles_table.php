<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateFriendshipsGroupsTable
 */
class CreateUsersRolesTable extends Migration
{

    public function up() {

        Schema::create('users_roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('role_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->timestamps();
        });

    }

    public function down() {
        Schema::dropIfExists('users_roles');
    }

}