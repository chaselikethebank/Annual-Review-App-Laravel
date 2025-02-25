<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualifier extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'note',
        'extra',
        'rating',
        'behavioral_id',
    ];

    public function behavioral()
    {
        return $this->belongsTo(Behavioral::class);
    }

    public function guide()
    {
        return $this->belongsTo(Guide::class);
    }
}
