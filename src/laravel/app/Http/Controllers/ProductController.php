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

    

}