<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;
use App\Models\Category;
use App\Models\Brand;
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

    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'product_id','id');
    }
    
    public function category()
    {
    return $this->belongsTo (Category::class, 'category_id', 'id');
    }
    public function brand()
    {
    return $this->belongsTo (Brand::class, 'brand_id', 'id');
    }

}