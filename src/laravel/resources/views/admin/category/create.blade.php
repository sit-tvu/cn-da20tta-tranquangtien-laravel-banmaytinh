@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Add Category
                    <a href="{{url('admin/category/create')}}" class="btn btn-primary btn-sm text-white float-end">Back</a>
                </h3>
                <div class="card-body">

                    <form action="{{url('admin/category')}}" enctype="multipart/form-data" method="POST">
                        @csrf

                    <div class="row">
                        <div class="mb3 col-md-6">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="mb3 col-md-6">
                            <label for="">Slug</label>
                            <input type="text" name="slug" class="form-control" required>
                        </div>

                        <div class="mb3 col-md-12">
                            <label for="">Description</label>
                            <textarea type="text" name="description" class="form-control" rows="3" required></textarea>
                        </div>

                        <div class="mb3 col-md-6">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="mb3 col-md-6">
                            <label for="">Status</label>
                            <input type="checkbox" name="status" required>
                        </div>

                        <div class="con-md-12 mb3">
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
                        </div>

                        <div class="mb3 col-md-12">
                            <button type="submit" class="btn btn-primary float-end">Save</button>
                        </div>
                    </div>
                        


                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection