@extends('layouts.admin')
@section('content')

<div>
 
    <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Thương hiệu
                            <a href="{{url('admin/brand/create')}}" class="btn btn-primary float-end">Thêm thương hiệu</a>
                        </h3>
                        <div class="card-body">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr class="text-center">
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>Đường dẫn</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($brands as $brand)
                                    <tr>
                                    <td>{{ $brand->id }}</td>
                                    <td>{{ $brand->name}}</td>
                                    <td>{{ $brand->slug }}</td>
                                    <td>{{ $brand->status == '1' ? 'Ẩn': 'Hiện' }}</td>
                                    <td>
                                        <a href="{{ url('admin/brand/'.$brand->id.'/edit') }}"><svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 512 512"><path fill="#115ee4" d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg></a>
                                        <a href="{{ url('admin/brand/'.$brand->id.'/delete') }}" onclick="return confirm('Bạn có muốn xóa thương hiệu?')"><svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" 
                                            viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome
                                                 - https://fontawesome.com License - https://fontawesome.com/license/free
                                                  Copyright 2024 Fonticons, Inc.--><path fill="#ea2610" d="M256 48a208 208
                                                   0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1
                                                    0 0 512zM175 175c-9.4 9.4-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6
                                                     0 33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 
                                                     0-33.9l-47-47 47-47c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-47 
                                                     47-47-47c-9.4-9.4-24.6-9.4-33.9 0z"/></svg></a>
                                    </td>
                                    </tr>
                                    @empty
                                    <tr>
                                    <td colspan="7">Không có thương hiệu khả dụng</td>
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