@extends('layouts.admin')
@section('content')

<div>
 
    <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>SẢN PHẨM
                            <a href="{{url('admin/products/create')}}" class="btn btn-primary float-end">THÊM SẢN PHẨM</a>
                        </h3>
                        <div class="card-body">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr class="text-center">
                                        <th>ID</th>
                                        <th>Danh mục</th>
                                        <th>Thương hiệu</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Trạng thái</th>
                                        <th>Xu hướng</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($products as $product)
                                    <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->category->name}}</td>
                                    <td>{{ $product->brand->name }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ number_format($product->cost)}}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->status == '1' ? 'Ẩn': 'Hiện' }}</td>
                                    <td>{{ $product->trending == '1' ? 'Có': 'Không' }}</td>
                                    <td>
                                        <a href="{{ url('admin/products/'.$product->id.'/edit') }}"><svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 512 512"><path fill="#115ee4" d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg></a>
                                        <a href="{{ url('admin/products/'.$product->id.'/delete') }}" onclick="return confirm('Bạn có muốn xóa sản phẩm?')"><svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#f6331e" d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></a>
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