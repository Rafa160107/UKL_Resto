<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_listMOD extends Model
{
    use HasFactory;
    protected $table="order_list";
    protected $primarykey="id";
    public $fillable=["customer_name","table_number"];
    public $timestamps=true;

 
}