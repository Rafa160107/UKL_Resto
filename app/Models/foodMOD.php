<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class foodMOD extends Model
{
    use HasFactory;

    protected $table = 'food', $primaryKey = 'id_food';
    public $timestamps = false, $fillable = [
        'name',
        'spicy_level',
        'price',
        'image'
    ];
}
