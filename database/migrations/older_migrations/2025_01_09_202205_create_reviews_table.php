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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // The user filling out the review
            $table->foreignId('reviewee_id')->constrained('users')->onDelete('cascade'); // The person being reviewed
            $table->foreignId('job_role_id')->constrained()->onDelete('cascade'); // The job role of the reviewer
            $table->enum('review_type', [
                'self_assessment', 
                'manager_feedback', 
                'peer_feedback', 
                'subordinate_feedback', 
                'client_feedback', // Changed from customer_feedback
                'external_feedback', 
                'behavioral_feedback'
            ]);
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
