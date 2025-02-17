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
         Schema::table('qualifiers', function (Blueprint $table) {
             // Add foreign key constraint to behavioral_id
             $table->foreign('behavioral_id')->references('id')->on('behaviorals')->onDelete('cascade');
         });
     }
     
     public function down()
     {
         Schema::table('qualifiers', function (Blueprint $table) {
             $table->dropForeign(['behavioral_id']);
         });
     }
};
