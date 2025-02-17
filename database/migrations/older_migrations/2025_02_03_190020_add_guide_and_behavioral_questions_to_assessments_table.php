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
        Schema::table('assessments', function (Blueprint $table) {
            $table->json('guide_ratings')->nullable();   
            $table->json('guide_feedback')->nullable(); 
            
            $table->json('behavioral_ratings')->nullable();   
            $table->json('behavioral_feedback')->nullable(); 
        });
    }

    public function down()
    {
        Schema::table('assessments', function (Blueprint $table) {
            $table->dropColumn(['guide_ratings', 'guide_feedback', 'behavioral_ratings', 'behavioral_feedback']);
        });
    }

};
