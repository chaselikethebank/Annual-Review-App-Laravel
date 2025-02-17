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
            // $table->json('guide_ratings')->nullable();  
            $table->json('behavioral_data')->nullable(); 
        });
    }

    public function down()
    {
        Schema::table('assessments', function (Blueprint $table) {
            // $table->dropColumn('guide_ratings');
            $table->dropColumn('behavioral_data');
        });
    }
};
