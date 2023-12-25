@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>SỬA SẢN PHẨM
                    <a href="{{url('admin/products')}}" class="btn btn-primary btn-sm text-white float-end">TRỞ VỀ</a>
                </h3>
                <div class="card-body">
                    @if(session('message'))
                    <h4>{{ session('message') }}</h4>
                    @endif
                <form action="{{url('admin/products/'.$product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">THÔNG TIN</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="detail-tab" data-bs-toggle="tab" data-bs-target="#detail-tab-pane" type="button" role="tab" aria-controls="detail-tab-pane" aria-selected="false">CHI TIẾT</button>
                        </li>
                        {{-- <li class="nav-item" role="presentation">
                          <button class="nav-link" id="other-tab" data-bs-toggle="tab" data-bs-target="#other-tab-pane" type="button" role="tab" aria-controls="other-tab-pane" aria-selected="false">Other</button>
                        </li> --}}
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">HÌNH ẢNH</button>
                          </li>
                        {{-- <li class="nav-item" role="presentation">
                          <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane" type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false" disabled>Disabled</button>
                        </li> --}}
                    </ul> 
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade border p-5  show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                <div class="mb-3">
                                    <label >DANH MỤC SẢN PHẨM</label>
                                    <select class="form-control" name="category_id">
                                        @foreach ($categories as $category )
                                            <option value="{{ $category -> id }}" {{  $category->name == $product->category? 'selected':'' }}> {{ $category -> name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label >THƯƠNG HIỆU</label>
                                    <select class="form-control" name="brand_id">
                                        @foreach ($brands as $brand )
                                            <option value="{{ $brand -> id }}" {{  $brand->name == $product->brand? 'selected':'' }}> {{ $brand -> name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label >TÊN SẢN PHẨM</label>
                                    <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                                </div>

                                <div class="mb-3">
                                    <label >ĐƯỜNG DẪN</label>
                                    <input type="text" name="slug" class="form-control" value="{{ $product->slug }}" required>
                                </div>

                        </div>
                    <div class="tab-pane fade border p-5" id="detail-tab-pane" role="tabpanel" aria-labelledby="detail-tab" tabindex="0">
                        <div class="row"> 
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label >GIÁ GỐC</label>
                                    <input type="text" name="cost" class="form-control" value="{{ $product->cost }}" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label >GIÁ GIẢM</label>
                                    <input type="text" name="sale_cost" class="form-control" value="{{ $product->sale_cost }}" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label >SỐ LƯỢNG</label>
                                    <input type="text" name="quantity" class="form-control" value="{{ $product->quantity }}" required>
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label >MÀU SẮC</label>
                                    <input type="text" name="color" class="form-control" value="{{ $product->color }}" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label >PHIÊN BẢN</label>
                                    <input type="text" name="option" class="form-control" value="{{ $product->option }}" required>
                                </div>
                            </div>
                        </div>    

                        <div class="row">
                            <div class="col-md-4">
                            <div class="mb-3">
                                <label >TRẠNG THÁI</label>
                                <input type="checkbox" name="status" {{ $product->status==1 ? 'checked':'' }} style="width: 30px; height : 30px;">
                            </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label >BÁN CHẠY</label>
                                    <input type="checkbox" name="trending" {{ $product->trending==1 ? 'checked':'' }} class="" style="width: 30px; height : 30px;">
                                </div>
                            </div>
                        </div>

                        
                        <div class="row">
                            <div class="col-md-12">
                              <div class="mb-3">
                                <label>MÔ TẢ</label>
                                <textarea name="description" class="form-control"  rows="4">{{ $product->description }}</textarea>
                              </div>
                            </div>
                        </div>

                    </div>
                        {{-- <div class="tab-pane fade" id="other-tab-pane" role="tabpanel" aria-labelledby="other-tab" tabindex="0">...</div> --}}
                        <div class="tab-pane fade border p-5" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                                <div class="mb-3">
                                    <label for="">CHỌN ẢNH</label>
                                    <input type="file" name="image[]" multiple class="form-control">
                                </div>
                                <div>
                                    
                                    @if($product->productImages)
                                    <div class="row">
                                        @foreach ($product->productImages as $image) 
                                    <div class="col-md-2">
                                        <img src="{{ asset($image->image) }}" style="width: 80px; height:80px;" class="me-4" alt="lỗi" />
                                        <a href="{{ url('admin/product-image/'.$image->id.'/delete') }}" class="d-block"><svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#f6331e" d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></a>
                                    </div>
                                        @endforeach
                                    </div>
                                    @else
                                    <h5>Không có ảnh để hiển thị </h5> 
                                    @endif

                                </div>
                        </div>
                        {{-- <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">...</div> --}}
                      </div>
                      <div>
                        <button class="btn btn-primary" type="submit">LƯU</button>
                      </div>
                </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection