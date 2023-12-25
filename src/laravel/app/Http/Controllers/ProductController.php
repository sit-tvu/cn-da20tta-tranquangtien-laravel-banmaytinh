<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Product;
class ProductController extends Controller
{
public function showAllProducts()
{
    $laptops = Product::where('category_id', 1)
                   ->where('status', 0)
                   ->get();
    $macbooks = Product::where('category_id', 2)
                    ->where('status', 0)
                    ->get();
    $pcs = Product::where('category_id', 3)
                    ->where('status', 0)
                    ->get();
    $phukien = Product::where('category_id', 4)
                    ->where('status', 0)
                    ->get();
    

    return view("index", compact('laptops', 'macbooks','pcs','phukien'));
}

public function showProductDetail($id)
{
    $product = Product::findOrFail($id);
    $productImages = Product::with('productImages')->find($id);
     $brand = $product->brand;
     $relatedProducts = Product::where('brand_id', $brand->id)
         ->where('id', '!=', $id)
         ->orderBy('created_at', 'desc')
         ->take(3)
         ->get();
    return view('productdetail', compact('product', 'productImages','brand','relatedProducts'));

}

public function showByBrand($brand)
{
    // Lấy tất cả sản phẩm có brand là $brand
    $products = Product::where('brand', $brand)->get();

    // Truyền dữ liệu sang view và hiển thị
    return view('products.by_brand', compact('products', 'brand'));
}

}