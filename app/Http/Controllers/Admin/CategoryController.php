<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rules\Exists;
use App\Http\Requests\CategoryFormRequest;

class CategoryController extends Controller
{
   public function index(){
    return view('admin.category.index');
   }
   public function create()
   {
      
     
      return view('admin.category.create');
   }
   public function store(CategoryFormRequest $request)
   {
      $validatedData=$request->validated();
      $category=new Category;
      $category->name = $validatedData['name'];      
      $category->slug = Str::slug($validatedData['slug']);
      $category->description = $validatedData['description'];
      
      if($request->hasFile('image')){
         $file=$request->file('image');
         $ext=$file->getClientOriginalExtension();
         $fileName=time().'.'.$ext;

         $file->move('uploads/category',$fileName);
         $category->image = $fileName;
      }    

      $category->meta_title = $validatedData['meta_title'];
      $category->meta_keywords = $validatedData['meta_keywords'];
      $category->meta_description = $validatedData['meta_description'];
      $category->status= $request->status==true? '1':'0';
      $category->save();
      
      return redirect('admin/category')->with('message','Your category has been addd successfully');

   }
   public function edit(Category $category){
      return view('admin.category.edit',compact('category'));
   }
   public function update(CategoryFormRequest $request,$category )
   {
      $category=Category::findorFail($category);

      $validatedData = $request->validated();

      $category->name = $validatedData['name'];
      $category->slug = Str::slug($validatedData['slug']);
      $category->description = $validatedData['description'];

      $path='uploads/category'.$category->image;

      if ($request->hasFile('image')) {
         if(File::Exists($path)){
            File::delete($path);
         }
         $file = $request->file('image');
         $ext = $file->getClientOriginalExtension();
         $fileName = time() . '.' . $ext;

         $file->move('uploads/category', $fileName);
         $category->image = $fileName;
      }

      $category->meta_title = $validatedData['meta_title'];
      $category->meta_keywords = $validatedData['meta_keywords'];
      $category->meta_description = $validatedData['meta_description'];
      $category->status = $request->status == true ? '1' : '0';
      $category->update();

      return redirect('admin/category')->with('message', 'Your category has been updated successfully');
   }
}
