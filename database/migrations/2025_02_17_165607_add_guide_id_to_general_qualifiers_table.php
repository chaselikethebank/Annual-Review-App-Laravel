<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('general_qualifiers', function (Blueprint $table) {
            $table->unsignedBigInteger('guide_id')->nullable();  
            $table->foreign('guide_id')->references('id')->on('guides')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('general_qualifiers', function (Blueprint $table) {
            $table->dropForeign(['guide_id']);
            $table->dropColumn('guide_id');
        });
    }
};
