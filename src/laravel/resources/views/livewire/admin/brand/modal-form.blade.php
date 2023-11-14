<!-- Modal add -->
<div class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Brand</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form wire:submit.prevent="storeBrand">
        <div class="modal-body">
            <div class="mb-3">
                <label>BRAND NAME</label>
                <input type="text" class="form-control" wire:model.defer="name" required>
            </div>
            <div class="mb-3">
                <label>BRAND SLUG</label>
                <input type="text" class="form-control" wire:model.defer="slug" required>
            </div>
            <div class="mb-3">
                <label>STATUS</label>
                <input type="checkbox" wire:model.defer="status" style="width:30px; height:30px;"> <hr>
                <h6 style="color: red;">checked = Hidden, Un-checked = Visible</h6>
            </div>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
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
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Brand</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form wire:submit.prevent="updateBrand">
        <div class="modal-body">
            <div class="mb-3">
                <label>BRAND NAME</label>
                <input type="text" class="form-control" wire:model.defer="name" required>
            </div>
            <div class="mb-3">
                <label>BRAND SLUG</label>
                <input type="text" class="form-control" wire:model.defer="slug" required>
            </div>
            <div class="mb-3">
                <label>STATUS</label>
                {{-- <input type="checkbox" wire:model.defer="status" style="width:30px; height:30px;" {{ $this->status == 0 ? '':'checked' }}> <hr> --}}
                <input type="checkbox" {{ $brand->status == 1 ? 'checked' : '' }} wire:model.defer="status" style="width:30px; height:30px;">
                <h6 style="color: red;">checked = Hidden, Un-checked = Visible</h6>
            </div>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="resetInput()">Close</button>
          <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Update</button>
        </div>
    </form>
    </div>
  </div>
</div>
