<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserUserTable extends Migration
{
    public function up()
    {
        Schema::create('user_user', function (Blueprint $table) {
            $table->unsignedBigInteger('manager_id');
            $table->unsignedBigInteger('subordinate_id');
            $table->foreign('manager_id')->references('id')->on('users');
            $table->foreign('subordinate_id')->references('id')->on('users');
            $table->primary(['manager_id', 'subordinate_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_user');
    }
}
