<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_detailMOD extends Model
{
    use HasFactory;
    protected $table="order_detail";
    protected $primarykey="id";
    public $fillable=['id_order','quantity','id_food','price'];
    public $timestamps=false;
}