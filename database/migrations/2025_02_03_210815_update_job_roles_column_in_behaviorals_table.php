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
        Schema::table('behaviorals', function (Blueprint $table) {
            // Make the job_role_id column nullable
            $table->unsignedBigInteger('job_role_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('behaviorals', function (Blueprint $table) {
            // Revert the job_role_id column to NOT NULL
            $table->unsignedBigInteger('job_role_id')->nullable(false)->change();
        });
    }
};
