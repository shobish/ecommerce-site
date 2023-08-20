<style>
    .form-control, .dataTables_wrapper select {
    border: 1px solid #000000 !important;
    font-weight: 400;
    font-size: 0.875rem;
}


</style>
@extends('layouts.admin');
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-header">
                <h4>Edit Category
                    <a href="{{url('admin/category')}}" class="btn btn-primary float-end">back</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{url('admin/category/'.$category->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-4">
                            <label for="name">Name</label>
                            <input type="text" name="name"  value="{{$category->name}}" class="form-control"/>
                            @error('name')
                            <div class="alert alert-danger">{{$message}}</div>                                
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" value="{{$category->slug}}" class="form-control"/>
                            @error('slug')
                            <div class="alert alert-danger">{{$message}}</div>                                
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="description">Description</label>
                            <textarea class="form-control"  name="description">{{$category->description}}</textarea>
                            @error('description')
                            <div class="alert alert-danger">{{$message}}</div>                                
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="image">image</label>                       
                            <input type="file"  name="image" class="form-control"/>
                            <img src="{{asset('uploads/category/'.$category->image)}}" alt="" width="80px" height="80px">

                        </div>
                        <div class="col-md-4 mt-3">
                            <input type="checkbox" name="status" {{$category->status==1 ? 'checked':''}}/>
                            <label for="status" >status</label>      

                        </div>                    
                    </div>
                    <div class="row mt-5">
                        <h2>Meta Tags</h2>
                        <div class="col-md-4 mt-5 ">
                            <label for="meta_title">meta_title</label>
                            <input type="text" name="meta_title" class="form-control" value="{{$category->slug}}"/>
                            @error('meta_title')
                            <div class="alert alert-danger">{{$message}}</div>                                
                            @enderror
                        </div>
                        <div class="col-md-4  mt-5">
                            <label for="meta_description">meta_description</label>
                            <textarea class="form-control" name="meta_description">{{$category->slug}}</textarea>
                            @error('meta_description')
                            <div class="alert alert-danger">{{$message}}</div>                                
                            @enderror
                        </div>
                        <div class="col-md-4  mt-5">
                            <label for="meta_keywords">meta_keywords</label>
                            <input type="text"  name="meta_keywords" class="form-control" value="{{$category->slug}}"/>
                            @error('meta_keywords')
                            <div class="alert alert-danger">{{$message}}</div>                                
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-2">update</button>
                 </form>

            </div>
        </div>
    </div>
</div> 
@endsection                