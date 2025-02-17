<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssessmentsTable extends Migration
{
    public function up()
    {
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('review_id');
            $table->unsignedBigInteger('job_role_id');
            $table->unsignedBigInteger('guide_id');
            $table->tinyInteger('rating');  // Rating between 1 and 5
            $table->text('feedback')->nullable();  // Feedback for the guide, required for 1 or 5 rating
            $table->text('additional_notes')->nullable();  // Extra comment
            $table->boolean('status')->default(false);  // Status, default to false (not completed)
            $table->timestamps();

            // Foreign keys
            $table->foreign('review_id')->references('id')->on('reviews')->onDelete('cascade');
            $table->foreign('job_role_id')->references('id')->on('job_roles')->onDelete('cascade');
            $table->foreign('guide_id')->references('id')->on('guides')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('assessments');
    }
}
