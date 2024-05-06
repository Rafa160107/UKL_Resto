<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adminMOD extends Model
{
    use HasFactory;
    protected $table = 'admin',$primaryKey='id_admin';
    public $timestamps=false, $fillable=[
        'name','email','password'
    ];
}
