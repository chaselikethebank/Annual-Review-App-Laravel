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
            $table->string('title')->nullable()->change();
            $table->text('note')->nullable()->change();
            $table->integer('rating')->nullable()->change();
            $table->integer('guide_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('general_qualifiers', function (Blueprint $table) {
            $table->string('title')->nullable(false)->change();
            $table->text('note')->nullable(false)->change();
            $table->integer('rating')->nullable(false)->change();
            $table->integer('guide_id')->nullable(false)->change();
        });
    }
};