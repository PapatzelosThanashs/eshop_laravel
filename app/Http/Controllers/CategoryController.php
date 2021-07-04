<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Support\Facades\File; 

use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories= Category::all();
        return view('admin.category.category',compact('categories'));
    }


    public function create()
    {
        $categories= Category::all();
        return view('admin.category.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
        'category_name' => 'required',
        'category_slug' => 'required|unique:categories',
        'category_parent_id'=>'',
        'category_image'=>'mimes:jpg,bmp,png,jpeg',
        'is_home'=>'',
        ]);

        if($request->hasfile('category_image')){
            $image=$request->file('category_image');
            $ext=$image->extension();
            $image_name=time().'.'.$ext;
            $image->storeAs('public/product_photo/product_categories',$image_name);
        
        }
        Category::create([
        'category_name' => $request->category_name,
        'category_slug' => $request->category_slug,
        'category_parent_id'=>$request->category_parent_id,
        'category_image'=>$image_name,
        'is_home'=>$request->is_home,
        ]);

        $request->session()->flash('message','Category added');

        return redirect('admin/category');
    }
 

    public function delete(Category $category_id)
    {
        Category::destroy($category_id->id);
        if(File::exists(public_path('storage/product_photo/product_categories/'.$category_id->category_image))){
            File::delete(public_path('storage/product_photo/product_categories/'.$category_id->category_image));
            
        }
        request()->session()->flash('message','Category deleted');
        return back();
    }

    public function show(Category $category_id)
    {
      
        $category=Category::where(['id'=>$category_id->id])->first();
        $all_categories=Category::all()->except($category->id);
    
        return view('admin.category.show',compact('category','all_categories'));
    }

    public function update(Category $category)
    {
       
        $data=request()->validate([
        'category_name' => '',
        'category_slug' => '',
        'category_parent_id'=>'',
        'category_image'=>'mimes:jpg,bmp,png,jpeg',
        'is_home'=>'',
        ]);

     /** if user input new file store new image else store the old */
     if(request()->hasfile('category_image')){
        $OldImage=$category->category_image;
    
        if(File::exists(public_path('storage/product_photo/product_categories/'.$OldImage))){
            File::delete(public_path('storage/product_photo/product_categories/'.$OldImage));
            
        }

        $image=request()->file('category_image');
        $ext=$image->extension();
        $image_name=time().'.'.$ext;
        $image->storeAs('public/product_photo/product_categories',$image_name);
        $data['category_image']=$image_name;
    
    }else{
        $data['category_image']=$category->category_image;
    }

    if(isset(request()->is_home)){
        $data['is_home']=1;
    }else{
        $data['is_home']=0;  
    }


        $category->update($data);

        request()->session()->flash('message','Category edited');

        return redirect('admin/category');
    }


    public function status(Category $category_id,$status)
    {
       

        $status=!$status;
        $category_id->update(['status'=>$status]);

        request()->session()->flash('message','Category status updated');

        return redirect('admin/category');
    }
}
