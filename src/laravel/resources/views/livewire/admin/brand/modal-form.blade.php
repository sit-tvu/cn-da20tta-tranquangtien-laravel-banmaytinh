<!-- Modal -->
<div class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Brand</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form wire:submit.prevent="storeBrand">
        <div class="modal-body">
            <div class="mb3">
                <label>BRAND NAME</label>
                <input type="text" class="form-control" wire:model.defer="name" required>
            </div>
            <div class="mb3">
                <label>BRAND SLUG</label>
                <input type="text" class="form-control" wire:model.defer="slug" required>
            </div>
            <div class="mb3">
                <label>STATUS</label>
                <input type="checkbox" wire:model.defer="status"> <hr>
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