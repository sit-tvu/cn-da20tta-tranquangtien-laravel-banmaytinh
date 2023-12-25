<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use Illuminate\Support\Facades\File;

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
            
            $cost = intval(str_replace(',', '', $validatedData['cost']));
            $sale_cost = intval(str_replace(',', '', $validatedData['sale_cost']));

            $product = $category->products()->create([
            
               "category_id" => $validatedData["category_id"],
               "brand_id" => $validatedData["brand_id"],
               "name"=> $validatedData["name"],
                "slug" => Str::slug($validatedData["slug"]),
                "cost" => $cost,
                "sale_cost"=> $sale_cost,
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

        public function update(ProductFormRequest $request, int $product_id)
            {
                $validatedData = $request->validated();
                $product = Category::find($validatedData['category_id'])
                    ->products()->where('id', $product_id)->first();
            
                if ($product) {
                    $product->update([
                        "category_id" => $validatedData["category_id"],
                        "brand_id" => $validatedData["brand_id"],
                        "name" => $validatedData["name"],
                        "slug" => Str::slug($validatedData["slug"]),
                        "cost" => $validatedData["cost"],
                        "sale_cost" => $validatedData["sale_cost"],
                        "quantity" => $validatedData["quantity"],
                        "color" => $validatedData["color"],
                        "option" => $validatedData["option"],
                        "status" => $request->status == true ? '1' : '0',
                        "trending" => $request->trending == true ? '1' : '0',
                        "description" => $validatedData["description"],
                    ]);
                    
                    if ($request->hasFile('image')) {
                        $uploadPath = 'uploads/products/';
                        $i = 1;
            
                        foreach ($request->file('image') as $imageFile) {
                            $extention = $imageFile->getClientOriginalExtension();
                            $filename = time() . $i++ . '.' . $extention;
                            $imageFile->move($uploadPath, $filename);
                            $finalImagePathName = $uploadPath.$filename;
            
                            $product->productImages()->create([
                                'product_id' => $product->id,
                                'image' => $finalImagePathName,
                            ]);
                        }
                        return redirect('admin/products')->with('message', 'Cập nhật thành công!');
                    } else {
                        return redirect('admin/products')->with('message', 'Không tìm thấy sản phẩm');
                    }
                }
            }   
            
        
        public function destroyImage(int $product_image_id)
            {
                $productImage = ProductImage::findOrFail($product_image_id);
                if(File::exists($productImage->image)) {
                File::delete($productImage->image);
                }
                $productImage->delete();
                return redirect()->back()->with('message', 'Ảnh đã được xóa');
            }
        
        public function destroy(int $product_id)
        {
            $product = Product::findOrFail($product_id);
            if ($product->productImages) {
                foreach($product->productImages as $image){
                    if(File::exists($image->image)){
                        File::delete($image->image);
                    }
                }
            }
$product->delete();
return redirect()->back()->with('message', 'Đã xóa sản phẩm');
}
}