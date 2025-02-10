<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Qualifier extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',              
        'qualifier_text',   
        'qualifier_note',   
        'qualifier_extra',
        'order',     
    ];
    
    public function question(): BelongsTo
    {
       return $this->belongsTo(\App\Models\Question::class, 'question_id');  
    }
}
