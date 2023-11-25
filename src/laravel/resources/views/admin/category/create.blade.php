@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>THÊM DANH MỤC
                    <a href="{{url('admin/category')}}" class="btn btn-primary btn-sm text-white float-end">TRỞ VỀ</a>
                </h3>
                <div class="card-body">

                    <form action="{{url('admin/category')}}" enctype="multipart/form-data" method="POST">
                        @csrf

                    <div class="row">
                        <div class="mb3 col-md-6">
                            <label for="">TÊN DANH MỤC</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="mb3 col-md-6">
                            <label for="">ĐƯỜNG DẪN</label>
                            <input type="text" name="slug" class="form-control" required>
                        </div>

                        <div class="mb3 col-md-12">
                            <label for="">MÔ TẢ</label>
                            <textarea type="text" name="description" class="form-control" rows="3" required></textarea>
                        </div>

                        <div class="mb3 col-md-6">
                            <label for="">HÌNH ẢNH</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="mb3 col-md-6">
                            <label for="">TRẠNG THÁI</label>
                            <input type="checkbox" name="status" style="width:30px; height:30px;">
                        </div>

                        {{-- <div class="con-md-12 mb3">
                            <hr>
                            <h4><b>Tags</b></h4>
                        </div>

                        <div class="mb3 col-md-12">
                            <label for="">Meta_title</label>
                            <input type="text" name="meta_title" class="form-control" required>
                        </div>

                        <div class="mb3 col-md-12">
                            <label for="">Meta Keyword</label>
                            <textarea type="text" name="meta_keyword" class="form-control" rows="3" required></textarea>
                        </div>

                        <div class="mb3 col-md-12">
                            <label for="">Meta description</label>
                            <textarea type="text" name="meta_description" class="form-control" rows="3" required></textarea>
                        </div> --}}

                        <div class="mb3 col-md-12">
                            <button type="submit" class="btn btn-primary float-end">LƯU</button>
                        </div>
                    </div>
                        


                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection