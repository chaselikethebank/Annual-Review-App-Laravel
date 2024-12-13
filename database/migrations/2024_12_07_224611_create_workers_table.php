<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->foreignId('job_role_id')->constrained('job_roles')->onDelete('cascade');
            $table->foreignId('manager_id')->nullable()->constrained('workers')->onDelete('set null');
            $table->timestamps();
        });
    }
};
