@extends('layouts.admin')
@section('content')

<div>
 
    <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>SẢN PHẨM
                            <a href="{{url('admin/products/create')}}" class="btn btn-primary btn-sm float-end">THÊM SẢN PHẨM</a>
                        </h3>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Danh mục</th>
                                        <th>Thương hiệu</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Trạng thái</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($products as $product)
                                    <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->category->name}}</td>
                                    <td>{{ $product->brand->name }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->cost}}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->status == '1' ? 'Ẩn': 'Hiện' }}</td>
                                    <td>
                                        <a href="{{ url('admin/products/'.$product->id.'/edit') }}" class="btn btn-warning" style="border-color: black; border-width: 2px; border-style: solid; border-radius: 5px;">Sửa</a>
                                        <a href="" class="btn btn-danger" style="border-color: black; border-width: 2px; border-style: solid; border-radius: 5px;">Xóa</a>
                                    </td>
                                    </tr>
                                    @empty
                                    <tr>
                                    <td colspan="7">Không có sản phẩm khả dụng</td>
                                    </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection