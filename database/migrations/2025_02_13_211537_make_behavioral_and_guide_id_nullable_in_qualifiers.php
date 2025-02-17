<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeBehavioralAndGuideIdNullableInQualifiers extends Migration
{
    public function up()
    {
        Schema::table('qualifiers', function (Blueprint $table) {
            // Make both behavioral_id and guide_id nullable
            $table->integer('behavioral_id')->nullable()->change();
            $table->integer('guide_id')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('qualifiers', function (Blueprint $table) {
            // Revert to original state (making them non-nullable)
            $table->integer('behavioral_id')->nullable(false)->change();
            $table->integer('guide_id')->nullable(false)->change();
        });
    }
}

