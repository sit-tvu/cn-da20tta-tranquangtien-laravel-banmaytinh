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
                <table id="example" class="table table-striped table-bordered" style="width:100%">
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
                                        <a href="{{url('admin/category/'.$category->id.'/edit')}}" style=""><svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 512 512"><path fill="#115ee4" d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg></a>
                                        <a href="#" wire:click="deleteCategory({{$category->id}})" data-bs-toggle="modal" data-bs-target="#deleteModal" style=""><svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#f6331e" d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></a>
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