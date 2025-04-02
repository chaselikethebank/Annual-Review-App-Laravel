<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('general_qualifiers', function (Blueprint $table) {
            $table->text('note')->nullable(); // Add note column
        });
    }

    public function down(): void {
        Schema::table('general_qualifiers', function (Blueprint $table) {
            $table->dropColumn('note'); // Remove note if rollback
        });
    }
};
