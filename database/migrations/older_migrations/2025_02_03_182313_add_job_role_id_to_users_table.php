<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->unsignedBigInteger('job_role_id')->nullable(); 
        $table->foreign('job_role_id')->references('id')->on('job_roles')->onDelete('set null'); 
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropForeign(['job_role_id']);
        $table->dropColumn('job_role_id');
    });
}
};
