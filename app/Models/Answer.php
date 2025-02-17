<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'review_id',
        'qualifier_id',
        'rating',
        'comment',
    ];

    public function review()
    {
        return $this->belongsTo(Review::class);
    }

    public function qualifier()
    {
        return $this->belongsTo(Qualifier::class);
    }
}
