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
                <h4>Add Category
                    <a href="{{url('admin/category')}}" class="btn btn-primary float-end">back</a>
                </h4>
            </div>
            @if(session('message'))
               <div class="btn-sucess btn">{{session('message')}}</div> 
            @endif
            <div class="card-body">
                <form action="{{url('admin/category')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control"/>
                            @error('name')
                            <div class="alert alert-danger">{{$message}}</div>                                
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" class="form-control"/>
                            @error('slug')
                            <div class="alert alert-danger">{{$message}}</div>                                
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description"></textarea>
                            @error('description')
                            <div class="alert alert-danger">{{$message}}</div>                                
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="image">image</label>                        

                            <input type="file"  name="image" class="form-control"/>
                        </div>
                        <div class="col-md-4 mt-3">
                            <input type="checkbox" name="status"/>
                            <label for="status" >status</label>      

                        </div>                    
                    </div>
                    <div class="row mt-5">
                        <h2>Meta Tags</h2>
                        <div class="col-md-4 mt-5 ">
                            <label for="meta_title">meta_title</label>
                            <input type="text" name="meta_title" class="form-control"/>
                            @error('meta_title')
                            <div class="alert alert-danger">{{$message}}</div>                                
                            @enderror
                        </div>
                        <div class="col-md-4  mt-5">
                            <label for="meta_description">meta_description</label>
                            <textarea class="form-control" name="meta_description"> </textarea>
                            @error('meta_description')
                            <div class="alert alert-danger">{{$message}}</div>                                
                            @enderror
                        </div>
                        <div class="col-md-4  mt-5">
                            <label for="meta_keywords">meta_keywords</label>
                            <input type="text"  name="meta_keywords" class="form-control"/>
                            @error('meta_keywords')
                            <div class="alert alert-danger">{{$message}}</div>                                
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-2">Save</button>
                 </form>

            </div>
        </div>
    </div>
</div> 
@endsection                