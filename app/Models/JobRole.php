<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobRole extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Workers assigned to this job role
    // public function workers()
    // {
    //     return $this->belongsToMany(Worker::class, 'worker_job_roles');
    // }

    // Guides associated with this job role
    public function guides()
    {
        return $this->hasMany(Guide::class);
    }
}
