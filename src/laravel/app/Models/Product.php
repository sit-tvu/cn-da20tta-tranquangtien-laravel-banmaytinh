<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'category_id',
        'brand_id',
        'name',
        'slug',
        'cost',
        'sale_cost',
        'quantity',
        'color',
        'option',
        'status',
        'trending',
        'description',
    ] ;
}
