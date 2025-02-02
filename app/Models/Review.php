<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'reviewee_id',
        'job_role_id',
        'review_type',
        'calendar_term',
    ];
    // The user who is filling out the review
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // The person being reviewed
    public function reviewee()
    {
        return $this->belongsTo(User::class, 'reviewee_id');
    }

    // The job role of the person filling out the review
    public function jobRole()
    {
        return $this->belongsTo(JobRole::class);
    }
}
