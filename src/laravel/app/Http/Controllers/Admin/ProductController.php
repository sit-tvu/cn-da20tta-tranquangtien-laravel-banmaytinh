<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;

class ProductController extends Controller
{
    //
        public function index()
        {
            $products = Product::all();
            return view('admin.products.index', compact ('products'));
        }
        public function create()
        {
            $categories = Category::all();
            $brands = Brand::all();
            return view("admin.products.create",compact(["categories", "brands"]));

        }
        public function store(ProductFormRequest $request){

            $validatedData = $request->validated() ;
            $category = Category::findOrFail($validatedData["category_id"]);
            
            $product = $category->products()->create([
            
               "category_id" => $validatedData["category_id"],
               "brand_id" => $validatedData["brand_id"],
               "name"=> $validatedData["name"],
                "slug" => Str::slug($validatedData["slug"]),
                "cost" => $validatedData["cost"],
                "sale_cost"=> $validatedData["sale_cost"],
                "quantity"=> $validatedData["quantity"],
                "color"=> $validatedData["color"],
                "option" => $validatedData["option"],
                "status" => $request -> status == true ? '1':'0',
                "trending" => $request -> trending == true ? '1':'0',
                "description" => $validatedData["description"],

            ]);
            
            if($request->hasFile('image')) {
                $uploadPath = 'uploads/products/';
                $i = 1;
                foreach($request->file('image') as $imageFile){
                $extention = $imageFile->getClientOriginalExtension();
                $filename = time().$i++.'.'.$extention;
                $imageFile->move($uploadPath, $filename);
                $finalImagePathName = $uploadPath.$filename;
                
                $product->productImages()->create([
                'product_id' => $product->id,
                'image' => $finalImagePathName,
                ]);
            // return $product ->id;
            
                }
        return redirect('admin/products')->with('message','Thêm thành công!');
                }
        
        }    

        public function edit (int $product_id){
            $categories = Category::all();
            $brands = Brand::all();
            $product = Product::find($product_id);
            return view('admin.products.edit', compact('categories', 'brands', 'product'));
            }
}