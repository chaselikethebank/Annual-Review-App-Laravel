<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Guide extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'job_role_id',  
    ];

    public function jobRole(): BelongsTo
    {
        return $this->belongsTo(JobRole::class);
    }

    public function qualifiers()
    {
        return $this->hasMany(Qualifier::class);
    }

    public function generalQualifiers()
    {
        return $this->hasMany(GeneralQualifier::class);
    }

    public function departments()
    {
        return $this->hasMany(Department::class);
    }
}
