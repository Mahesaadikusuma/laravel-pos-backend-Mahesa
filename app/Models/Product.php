<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        'description',
        'price',  
        'stok', 
        'category', 
        'image',  
    ];
    protected $dates = ['created_at', 'updated_at'];
}
