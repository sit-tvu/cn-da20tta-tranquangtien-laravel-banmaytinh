<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductFormRequest;
class ProductController extends Controller
{
    //
        public function index()
        {
            return view("admin.products.index");
        }
        public function create()
        {
            $categories = Category::all();
            $brands = Brand::all();
            return view("admin.products.create",compact(["categories", "brands"]));

        }
        public function store(ProductFormRequest $request){

            $validatedData = $request->validated() ;
        }
}
