@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Thêm Thương hiệu
                        <a href="{{ url('admin/brand') }}" class="btn btn-primary btn-sm text-white float-end">TRỞ VỀ</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/brand') }}" enctype="multipart/form-data" method="POST">
                        @csrf

                            <div class="mb3 col-md-6">
                                <label for="">Tên Thương Hiệu</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <div class="mb3 col-md-6">
                                <label for="">Đường Dẫn</label>
                                <input type="text" name="slug" class="form-control" required>
                            </div>

                            <div class="mb3 col-md-6">
                                <label for="">TRẠNG THÁI</label>
                                <input type="checkbox" name="status" style="width:30px; height:30px;">
                                <br>(Chọn = Ẩn)
                            </div>

                            <div class="mb3 col-md-12">
                                <button type="submit" class="btn btn-primary float-end">LƯU</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
