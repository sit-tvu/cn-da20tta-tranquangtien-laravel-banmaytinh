<div>
        @include('livewire.admin.brand.modal-form')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            DANH SÁCH THƯƠNG HIỆU
                            <a href="#" data-bs-toggle="modal" data-bs-target="#addBrandModal" class="btn btn bg-primary btn-sm float-end">Thêm thương hiệu</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>TÊN</th>
                                    <th>ĐƯỜNG DẪN</th>
                                    <th>TRẠNG THÁI</th>
                                    <th>HÀNH ĐỘNG</th>
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
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#updateBrandModal" wire:click ="editBrand({{$brand->id}})" class="btn btn-warning" style="border-color: black; border-width: 2px; border-style: solid; border-radius: 5px;">SỬA</a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#deleteBrandModal" wire:click ="deleteBrand({{$brand->id}})" class="btn btn-danger" style="border-color: black; border-width: 2px; border-style: solid; border-radius: 5px;">XÓA</a>
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
