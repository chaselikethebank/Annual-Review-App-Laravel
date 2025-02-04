<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Behavioral extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description', 
        'qualifying_1', 
        'qualifying_1_note', 
        'qualifying_2', 
        'qualifying_2_note', 
        'qualifying_3', 
        'qualifying_3_note', 
        'qualifying_4', 
        'qualifying_4_note', 
        'qualifying_5', 
        'qualifying_5_note'
    ];
}
