@extends('layouts.admin')
@section('content')

<div>
 
    <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Product
                            <a href="{{url('admin/products/create')}}" class="btn btn-primary btn-sm float-end">Add Product</a>
                        </h3>
                        <div class="card-body">
                            
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection