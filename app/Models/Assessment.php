<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    protected $fillable = [
        'review_id',           // Link to the review, which is a bundle of foreign ids for user, job role, guide, and term
        'job_role_id',         // Foreign key to a specific job role
        'guide_id',            // Foreign key to a specific guide
        'rating',              // Rating from 1 to 5
        'feedback',            // Feedback for the guide, mandatory if rating is 1 or 5
        'additional_notes',    // Extra comment, not tied to any specific guide
        'status',              // Boolean to track whether the assessment is complete
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
}
