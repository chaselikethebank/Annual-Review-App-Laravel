<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobRoleUserTable extends Migration
{
    public function up()
    {
        Schema::create('job_role_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_role_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_role_user');
    }
}
