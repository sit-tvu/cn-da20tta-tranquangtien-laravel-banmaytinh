<!-- Modal add -->
<div class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">THÊM THƯƠNG HIỆU</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form wire:submit.prevent="storeBrand">
        <div class="modal-body">
            <div class="mb-3">
                <label>TÊN THƯƠNG HIỆU</label>
                <input type="text" class="form-control" wire:model.defer="name" required>
            </div>
            <div class="mb-3">
                <label>ĐƯỜNG DẪN</label>
                <input type="text" class="form-control" wire:model.defer="slug" required>
            </div>
            <div class="mb-3">
                <label>TRẠNG THÁI</label>
                <input type="checkbox" wire:model.defer="status" style="width:30px; height:30px;"> <hr>
                <h6 style="color: red;">check = ẩn</h6>
            </div>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ĐÓNG</button>
          <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">LƯU</button>
        </div>
    </form>
    </div>
  </div>
</div>

<!-- Modal brand update-->
<div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">CẬP NHẬT</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form wire:submit.prevent="updateBrand">
        <div class="modal-body">
            <div class="mb-3">
                <label>TÊN THƯƠNG HIỆU</label>
                <input type="text" class="form-control" wire:model.defer="name" required>
            </div>
            <div class="mb-3">
                <label>ĐƯỜNG DẪN</label>
                <input type="text" class="form-control" wire:model.defer="slug" required>
            </div>
            <div class="mb-3">
                <label>TRẠNG THÁI</label>
                {{-- <input type="checkbox" wire:model.defer="status" style="width:30px; height:30px;" {{ $this->status == 0 ? '':'checked' }}> <hr> --}}
                <input type="checkbox" {{ $status == 1 ? 'checked' : '' }} wire:model.defer="status" style="width:30px; height:30px;">
                <h6 style="color: red;">check = ẩn</h6>
            </div>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="resetInput()">ĐÓNG</button>
          <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">CẬP NHẬT</button>
        </div>
    </form>
    </div>
  </div>
</div>


<!-- Modal brand delete-->
<div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">XÓA THƯƠNG HIỆU</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form wire:submit.prevent="destroyBrand">
        <div class="modal-body">
            <h4>Bạn chắc chứ?</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="resetInput()">ĐÓNG</button>
          <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">XÓA</button>
        </div>
    </form>
    </div>
  </div>
</div>