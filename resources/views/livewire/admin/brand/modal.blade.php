
<!-- Modal -->
<div  wire:ignore.self class="modal fade" id="brandFormModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Brands</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form wire:submit.prevent='storeBrand'>
            @csrf

            <div class="input-group mb-3">
                <span class="input-group-text">Name</span>
                <input type="text" class="form-control" wire:model.defer="name" placeholder="name" aria-label="Name">
                @error('name'){{$message}}@enderror
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">slug</span>
                <input type="text" class="form-control" wire:model.defer="slug" placeholder="slug" aria-label="slug">
                @error('slug'){{$message}}@enderror
            </div>
            
            <div class="form-check form-switch" style="margin-left:45px;">
                <input class="form-check-input"  wire:model.defer="status" type="checkbox" id="status" checked>
                <label class="form-check-label" for="status">status</label>
                 @error('status'){{$message}}@enderror
            </div>
                      

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>

        </form>

      </div>
      
    </div>
  </div>
</div>

{{-- update brand modal --}}
<div  wire:ignore.self class="modal fade" id="updateBrand" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update Brands</h5>
        <button type="button" class="btn-close" wire:click="closeModal " data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <div wire:loading class="spinner-border text-success" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
        <div wire:loading.remove >
          <form wire:submit.prevent='updateBrand'>
              @csrf

              <div class="input-group mb-3">
                  <span class="input-group-text">Name</span>
                  <input type="text" class="form-control" wire:model.defer="name" placeholder="name" aria-label="Name">
                  @error('name'){{$message}}@enderror
              </div>
              <div class="input-group mb-3">
                  <span class="input-group-text">slug</span>
                  <input type="text" class="form-control" wire:model.defer="slug" placeholder="slug" aria-label="slug">
                  @error('slug'){{$message}}@enderror
              </div>
              
              <div class="form-check form-switch" style="margin-left:45px;">
                  <input class="form-check-input"  wire:model.defer="status" type="checkbox" id="status" checked>
                  <label class="form-check-label" for="status">status</label>
                    @error('status'){{$message}}@enderror
              </div>
                        

              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="closeModal ">Close</button>
                  <button type="submit" class="btn btn-primary">update</button>
              </div>

          </form>
        </div>
      </div>
      
    </div>
  </div>
</div>

{{-- delete brand modal --}}
<div  wire:ignore.self class="modal fade" id="deleteBrand" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">delete Brand</h5>
        <button type="button" class="btn-close" wire:click="closeModal " data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <div wire:loading class="spinner-border text-success" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
        
        <div wire:loading.remove >
          <form wire:submit.prevent='deleteBrand'>
              <h4>are you sure to delete</h4>
                        
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="closeModal ">Close</button>
                  <button type="submit" class="btn btn-primary">delete</button>
              </div>

          </form>
        </div>
      </div>
      
    </div>
  </div>
</div>