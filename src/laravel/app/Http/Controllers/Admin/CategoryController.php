<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \Illuminate\Support\Facades\File;
class CategoryController extends Controller
{
    public function index(){
        return view("admin.category.index");
    }
    public function create(){
        return view("admin.category.create");
    }
    public function store(CategoryFormRequest $request){
        $validatedData = $request->validated();
        $category = new Category;
        $category->name = $validatedData["name"];
        $category->slug = Str::slug($validatedData["slug"]);
        $category->description = $validatedData["description"];

        if($request->hasFile("image")){
            $file = $request->file("image");
            $ext = $file-> getClientOriginalExtension();
            $filename = time().".".$ext;
            $file->move('uploads/category/',$filename);
        $category->image = $filename;
        }
        $category->status = $request->status == true ? '1':'0' ;
        $category->save();
        return redirect('admin/category')->with('message','add success!');
    }
    public function edit(Category $category){
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryFormRequest $request, Category $category){ 
        $validatedData = $request->validated();

        // $category = Category::findOrfail($category);

        $category->name = $validatedData["name"];
        $category->slug = Str::slug($validatedData["slug"]);
        $category->description = $validatedData["description"];

        if($request->hasFile("image")){
            $path = 'uploads/category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file("image");
            $ext = $file-> getClientOriginalExtension();
            $filename = time().".".$ext;
            $file->move('uploads/category/',$filename);
            $category->image = $filename;
        }
        $category->status = $request->status == true ? '1':'0' ;
        $category->update();
        return redirect('admin/category')->with('message','update success!');
    }
}
