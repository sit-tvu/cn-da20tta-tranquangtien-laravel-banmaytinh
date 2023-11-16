@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Add Products
                    <a href="{{url('admin/products')}}" class="btn btn-primary btn-sm text-white float-end">Back</a>
                </h3>
                <div class="card-body">
                    @if ($errors -> any())
                        <div class="alert alert-warning">
                            @foreach ($errors -> all() as  $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                <form action="{{url('admin/products')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Info</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="detail-tab" data-bs-toggle="tab" data-bs-target="#detail-tab-pane" type="button" role="tab" aria-controls="detail-tab-pane" aria-selected="false">Detail</button>
                        </li>
                        {{-- <li class="nav-item" role="presentation">
                          <button class="nav-link" id="other-tab" data-bs-toggle="tab" data-bs-target="#other-tab-pane" type="button" role="tab" aria-controls="other-tab-pane" aria-selected="false">Other</button>
                        </li> --}}
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">Images</button>
                          </li>
                        {{-- <li class="nav-item" role="presentation">
                          <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane" type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false" disabled>Disabled</button>
                        </li> --}}
                    </ul> 
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade border p-5  show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                <div class="mb-3">
                                    <label >CATEGORY</label>
                                    <select class="form-control" name="category_id">
                                        @foreach ($categories as $category )
                                            <option value="{{ $category -> id }}">{{ $category -> name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label >BRAND</label>
                                    <select class="form-control" name="brand_id">
                                        @foreach ($brands as $brand )
                                            <option value="{{ $brand -> id }}">{{ $brand -> name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label >NAME</label>
                                    <input type="text" name="name" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label >SLUG</label>
                                    <input type="text" name="slug" class="form-control" required>
                                </div>

                        </div>
                    <div class="tab-pane fade border p-5" id="detail-tab-pane" role="tabpanel" aria-labelledby="detail-tab" tabindex="0">
                        <div class="row"> 
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label >COST</label>
                                    <input type="text" name="cost" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label >SALE COST</label>
                                    <input type="text" name="sale_cost" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label >QUANTITY</label>
                                    <input type="text" name="quantity" class="form-control" required>
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label >COLOR</label>
                                    <input type="text" name="color" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label >OPTION</label>
                                    <input type="text" name="option" class="form-control" required>
                                </div>
                            </div>
                        </div>    

                        <div class="row">
                            <div class="col-md-4">
                            <div class="mb-3">
                                <label >STATUS</label>
                                <input type="checkbox" name="status" class="" style="width: 30px; height : 30px;">
                            </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label >TRENDING</label>
                                    <input type="checkbox" name="trending" class="" style="width: 30px; height : 30px;">
                                </div>
                            </div>
                        </div>

                        
                        <div class="row">
                            <div class="col-md-12">
                              <div class="mb-3">
                                <label>DESCRIPTION</label>
                                <textarea name="description" class="form-control" rows="4" style="background-color:#B5B5B5"></textarea>
                              </div>
                            </div>
                        </div>

                    </div>
                        {{-- <div class="tab-pane fade" id="other-tab-pane" role="tabpanel" aria-labelledby="other-tab" tabindex="0">...</div> --}}
                        <div class="tab-pane fade border p-5" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                                <div class="mb-3">
                                    <label for="">SELECT IMAGE</label>
                                    <input type="file" name="image" multiple class="form-control">
                                </div>
                        </div>
                        {{-- <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">...</div> --}}
                      </div>
                      <div>
                        <button class="btn btn-primary" type="submit">SAVE</button>
                      </div>
                </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection