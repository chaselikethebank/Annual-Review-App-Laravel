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
                $table->text('description')->nullable();
                $table->string('qualifying_1')->nullable();
                $table->text('qualifying_1_note')->nullable();
                $table->string('qualifying_2')->nullable();
                $table->text('qualifying_2_note')->nullable();
                $table->string('qualifying_3')->nullable();
                $table->text('qualifying_3_note')->nullable();
                $table->string('qualifying_4')->nullable();
                $table->text('qualifying_4_note')->nullable();
                $table->string('qualifying_5')->nullable();
                $table->text('qualifying_5_note')->nullable();
            });
        }

        public function down()
        {
            Schema::table('behaviorals', function (Blueprint $table) {
                $table->dropColumn([
                    'description', 
                    'qualifying_1', 
                    'qualifying_1_note', 
                    'qualifying_2', 
                    'qualifying_2_note', 
                    'qualifying_3', 
                    'qualifying_3_note', 
                    'qualifying_4', 
                    'qualifying_4_note', 
                    'qualifying_5', 
                    'qualifying_5_note'
                ]);
            });
        }

};
