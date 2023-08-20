<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Index extends Component

{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name,$slug,$status , $brand_id;

    public function rules(){
        return[
            'name' => 'required',
            'slug' => 'required',
            'status'=>'nullable'
        ];        

    }
    public function resetinput() {
        $this->name=null;
        $this->slug= null;
        $this->status= null;
        $this->brand_id = null;
    }

    public function storeBrand(){
        $validatedData=$this->validate();

        Brand::create([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status==true ? '0' : '1',
        ]);
        session()->flash('message','brand added successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetinput();
    }
     public function closeModal()
    {
        $this->resetinput();
    }
     public function openModal()
    {
        $this->resetinput();
    }

    public function editBrand(int $brand_id)
    {
        $this->brand_id= $brand_id;

        $brand=Brand::findOrFail($brand_id);
            $this->name= $brand->name;
    $this->slug = $brand->slug;
            $this->status = $brand->status;
    }
    public function updateBrand()
    {
        $validatedData = $this->validate();
        
        Brand::findOrFail($this->brand_id)->update([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1' : '0',
        ]);
        session()->flash('message', 'brand updated successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetinput();
        
    }
    public function deleteBrand()
    {
        
        Brand::findOrFail($this->brand_id)->delete();
        session()->flash('message', 'brand deleted successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetinput();
    }

    
    public function render()
    {
        $brand=Brand::orderBy('id','desc')->paginate(5);
        return view('livewire.admin.brand.index',['brand'=>$brand])
        ->extends('layouts.admin')
            ->section('content');
    }
    



}
