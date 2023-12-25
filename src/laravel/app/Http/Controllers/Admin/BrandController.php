<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('id', 'DESC')->paginate(10);
        return view('admin.brand.index', ['brands' => $brands]);
    }

    public function create()
    {
    return view('admin.brand.create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string',
            'status' => 'nullable',
        ]);
    
        Brand::create([
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'status' => $request->status == true ? '1' : '0',
        ]);
    
        session()->flash('message', 'Thêm thành công');
        return redirect('admin/brand');
    }
    


    public function edit($brand_id)
    {
        $brands = Brand::find($brand_id);

        return view('admin.brand.edit', ['brands' => $brands]);
    }

    public function update(Request $request, $brand_id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string',
            'status' => 'nullable',
        ]);

        Brand::find($brand_id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'status' => $request->status == true ? '1' : '0',
        ]);

        session()->flash('message', 'Cập nhật thành công!');
        return redirect('admin/brand');
    }

    public function destroy($brand_id)
    {
        Brand::find($brand_id)->delete();
        session()->flash('message', 'Xóa thành công!');
        return redirect()->back()->with('message', 'Đã xóa sản phẩm');
    }
}