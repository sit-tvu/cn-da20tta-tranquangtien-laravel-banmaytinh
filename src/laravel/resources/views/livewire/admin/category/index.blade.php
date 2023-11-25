<div>
<!-- Modal -->
<div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Xóa danh mục</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form wire:submit.prevent="destroyCategory">
        <div class="modal-body">
          <h5 style="color: red;">Bạn chắc chứ?</h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
          <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Xóa</button>
        </div>
        </form>
      </div>
    </div>
  </div>


<div class="row">
        <div class="col-md-12">
            @if(session('message'))
            
                <div class="alert alert-success">{{session('message')}}</div>
            
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Danh mục
                        <a href="{{url('admin/category/create')}}" class="btn btn-primary btn-sm float-end">Thêm danh mục</a>
                    </h3>
                    <div class="card-body"></div>
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                                <th>ID</th>
                                <th>TÊN DANH MỤC</th>
                                <th>ĐƯỜNG DẪN</th>
                                <th>TRẠNG THÁI</th>
                                <th>HÌNH ẢNH</th>
                                <th>HÀNH ĐỘNG</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{$category->status == '1' ? 'Hidden':'Visible'}}</td>
                                    <td><img src="{{asset('/uploads/category/'.$category->image)}}" alt="error" width="100px" height="100px"></td>
                                    <td>
                                        <a href="{{url('admin/category/'.$category->id.'/edit')}}" class="btn btn-warning" style="border-color: black; border-width: 2px; border-style: solid; border-radius: 5px;">SỬA</a>
                                        <a href="#" wire:click="deleteCategory({{$category->id}})" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" style="border-color: black; border-width: 2px; border-style: solid; border-radius: 5px;"><b>XÓA</b></a>
                                    </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{$categories ->links()}}
            </div>
        </div>
    </div>
</div>

</div>