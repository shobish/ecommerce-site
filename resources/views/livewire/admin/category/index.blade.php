<div class="row">
    <div class="col-md-12 grid-margin">
        @if(session('message'))
        <div class="alert alert-success">{{session('message')}} </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4>Category
                    <a href="{{url('admin/category/create')}}" class="btn btn-primary float-end">Add category</a>
                </h4>
            </div>
            <div class="card-body">
                
                <table class=" table table-bordered table-striped ">                
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category )
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->status==1 ? 'hidden':'visible'}}</td>
                            <td>
                                <a href="{{url('admin/category/'.$category->id.'/edit')}}" class="btn btn-primary">Edit</a>
                                <button wire:click="deleteCategory({{$category->id}})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger">delete</button>
                            </td>
                        </tr>
                         @endforeach
                    </tbody>

               
            </table>
            {{$categories->links()}}
            </div>
        </div>

       
    </div>



<!-- Delete Modal -->
<div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form wire:click ="distroy" >
        <div class="modal-body">
            <h5>Are you Sure</h5>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit"  class="btn btn-primary">delete</button>
        </div>
    </form>
    </div>
  </div>
</div>
<!-- Delete Modal end -->    
</div> 
