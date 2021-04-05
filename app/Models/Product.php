<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'desc',
        'stock',
        'code',
        'price',
        'discount',
        'status',
        'f_img',
        's_img',
        't_img',
    ];

}
