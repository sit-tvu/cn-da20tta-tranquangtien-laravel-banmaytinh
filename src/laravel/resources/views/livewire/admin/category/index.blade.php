<div>
<!-- Modal -->
<div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Delete category</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form wire:submit.prevent="destroyCategory">
        <div class="modal-body">
          <h5 style="color: red;">Are you sure?</h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
          <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Yes</button>
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
                    <h3>Category
                        <a href="{{url('admin/category/create')}}" class="btn btn-primary btn-sm float-end">Add Category</a>
                    </h3>
                    <div class="card-body"></div>
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>STATUS</th>
                                <th>ACTION</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->status == '1' ? 'Hidden':'Visible'}}</td>
                                    <td>
                                        <a href="{{url('admin/category/'.$category->id.'/edit')}}" class="btn btn-warning" style="border-color: black; border-width: 2px; border-style: solid; border-radius: 5px;">EDIT</a>
                                        <a href="#" wire:click="deleteCategory({{$category->id}})" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" style="border-color: black; border-width: 2px; border-style: solid; border-radius: 5px;"><b>DELETE</b></a>
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