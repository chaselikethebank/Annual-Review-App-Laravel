<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    protected $fillable = [
        'review_id',              // Link to the review, which contains foreign keys for job_role, guide, etc.
        'job_role_id',            // Foreign key to a specific job role
        'rating',                 // Rating for the assessment (1-5)
        'feedback',               // Feedback for the assessment
        'additional_notes',       // Extra comments
        'status',                 // Track if the assessment is complete
        'guide_feedback',         // Feedback from the guide
        'behavioral_feedback',    // Feedback on behavioral questions
        'guide_ratings',          // Ratings for the guide
        'behavioral_ratings',     // Ratings for behavioral questions
    ];
    

    public function review()
    {
        return $this->belongsTo(Review::class);   
    }

    public function jobRole()
    {
        return $this->belongsTo(JobRole::class);  
    }

    public function guide()
    {
        return $this->belongsTo(Guide::class);  
    }

    public function behaviorals()
    {
        return $this->hasMany(Behavioral::class);  
    }

   
}
