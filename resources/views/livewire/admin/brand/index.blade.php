<div>
@include('livewire.admin.brand.modal')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Brands
                            <a href="#" data-bs-toggle="modal" data-bs-target="#brandFormModal"class="btn btn-success float-end" >Add Brands</a>
                        </h4>
                    </div>
                    
                    @if(session('message'))
                        <div class="alert alert-success">{{session('message')}}</div>
                    @endif

                    <div class="card-body">
                        <table class="table table-striped ">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @forelse ($brand as $brandItems )     
                                    <tr>                                                                     
                                        <td>{{$brandItems->id}}</td>
                                        <td>{{$brandItems->name}}</td>
                                        <td>{{$brandItems->slug}}</td>
                                        <td>{{$brandItems->status=='1' ? 'visible': 'hide'}}</td>
                                        <td>
                                            <a href="#" wire:click="editBrand({{$brandItems->id}})" data-bs-toggle="modal" data-bs-target="#updateBrand" class="btn btn-primary">Edit</a>
                                            <a href="#" wire:click="editBrand({{$brandItems->id}})" data-bs-toggle="modal" data-bs-target="#deleteBrand"class="btn btn-danger">Delete</a>
                                        </td>                                   
                                    </tr>
                                @empty
                                    <tr>
                                        <td>No Brands Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        
                        </table>
                        <div>
                            {{$brand->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>


</div>
@push('script')
<script>
    window.addEventListener('close-modal',event=>{
        $('#brandFormModal').modal('hide');
        $('#updateBrand').modal('hide');
        $('#deleteBrand').modal('hide');
    })
</script>

@endpush