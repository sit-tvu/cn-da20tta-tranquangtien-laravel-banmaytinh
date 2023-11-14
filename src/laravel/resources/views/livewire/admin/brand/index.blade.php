<div>
        @include('livewire.admin.brand.modal-form')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Brands List
                            <a href="#" data-bs-toggle="modal" data-bs-target="#addBrandModal" class="btn btn bg-primary btn-sm float-end">Add brand</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NAME</th>
                                    <th>SLUG</th>
                                    <th>STATUS</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($brands as $brand)
                                        <tr>
                                            <td>{{ $brand->id }}</td>
                                            <td>{{ $brand->name }}</td>
                                            <td>{{ $brand->slug }}</td>
                                            <td>{{ $brand->status == 1 ? 'hidden':'visible' }}</td>
                                            <td>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#updateBrandModal" wire:click ="editBrand({{$brand->id}})" class="btn btn-warning" style="border-color: black; border-width: 2px; border-style: solid; border-radius: 5px;">Edit</a>
                                                <a href="" class="btn btn-danger" style="border-color: black; border-width: 2px; border-style: solid; border-radius: 5px;">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>
