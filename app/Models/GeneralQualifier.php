<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Guide;

class GeneralQualifier extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'note',
        'rating',
        'guide_id', // We'll add guide_id to link it with guides
    ];

    public function guide()
    {
        return $this->belongsTo(Guide::class);
    }

 
}
