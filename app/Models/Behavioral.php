<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Behavioral extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description', 
    ];

    public function qualifiers()
    {
        return $this->hasMany(Qualifier::class);
    }
}
