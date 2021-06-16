<?php

namespace App\Http\Controllers;
use App\Models\Category;

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
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
     
        $request->validate([
        'category_name' => 'required',
        'category_slug' => 'required|unique:categories',
    ]);

        Category::create([
        'category_name' => $request->category_name,
        'category_slug' => $request->category_slug,
    ]);

        $request->session()->flash('message','Category added');

        return redirect('admin/category');
    }
 

    public function delete(Category $category_id)
    {
        Category::destroy($category_id->id);
        request()->session()->flash('message','Category deleted');
        return back();
    }

    public function show(Category $category_id)
    {
      
       $category=Category::where(['id'=>$category_id->id])->first();
       
    
        return view('admin.category.show',compact('category'));
    }

    public function update(Category $category)
    {
       
        $data=request()->validate([
        'category_name' => 'required',
        'category_slug' => 'required',
    ]);

        $category->update($data);

        request()->session()->flash('message','Category edited');

        return redirect('admin/category');
    }


    public function status(Category $category_id,$status)
    {
       
        //dd($status);

        $status=!$status;
        $category_id->update(['status'=>$status]);

        request()->session()->flash('message','Category status updated');

        return redirect('admin/category');
    }
}
