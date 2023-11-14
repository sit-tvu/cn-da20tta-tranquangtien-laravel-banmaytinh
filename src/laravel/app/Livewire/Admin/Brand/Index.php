<?php

namespace App\Livewire\Admin\Brand;

use App\Models\Brand;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{   
    use WithPagination;
    protected $paginationTheme = "boostrap";

    public $name, $slug, $status, $brand_id;

    public function rules()
    {
            return [
                "name"=> "required|string",
                "slug"=> "required|string",
                "status"=> "nullable",
            ];
    }
    public function resetInput()
    {
        $this->name = NULL;
        $this->slug = NULL;
        $this->status = NULL;
    }
    public function storeBrand()
    {
        $validatedData = $this ->validate();
        Brand::create([
            'name'=> $this -> name,
            'slug'=>Str::slug($this -> slug),
            'status'=> $this -> status == true ?'1':'0',
            ]);
            session()->flash('message','Add success!');
            $this -> resetInput();
    }

    public function editBrand(int $brand_id){
        $this->brand_id = $brand_id;
        $brand = Brand::find($brand_id);
        // $brand = Brand::where('id', $brand_id)->first();
        $this->name =  $brand->name;
        $this->slug =  $brand->slug;
        $this->status =  $brand->status;
        
     }
     public function updateBrand(){
        $validatedData = $this ->validate();
        Brand::find($this->brand_id)->update([
            'name'=> $this -> name,
            'slug'=>Str::slug($this -> slug),
            'status'=> $this -> status == 'checked' ?'1':'0',
            ]);
            session()->flash('message','update success!');
            $this -> resetInput();
     }
     

    
    public function render()
    {
        $brands = Brand::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.brand.index',['brands'=> $brands])
                    ->extends('layouts.admin')
                    ->section('content');
    }
}
