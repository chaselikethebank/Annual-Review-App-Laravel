<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'job_role_id'];

    // Define the inverse of the relationship (a guide belongs to a job role)
    public function jobRole()
    {
        return $this->belongsTo(JobRole::class);
    }
}
