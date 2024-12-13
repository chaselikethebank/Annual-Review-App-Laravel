<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'job_role_id', 'manager_id'];

    // Belongs to a specific job role
    public function jobRole()
    {
        return $this->belongsTo(JobRole::class, 'job_role_id');
    }

    // Belongs to a manager
    public function manager()
    {
        return $this->belongsTo(Worker::class, 'manager_id');
    }

    // Has many subordinates (workers they manage)
    public function subordinates()
    {
        return $this->hasMany(Worker::class, 'manager_id');
    }

    // Belongs to many job roles (if applicable)
    public function jobRoles()
    {
        return $this->belongsToMany(JobRole::class, 'worker_job_roles');
    }
}
