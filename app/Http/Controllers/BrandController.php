<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands= Brand::all();
        return view('admin.brand.brand',compact('brands'));
    }


    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(Request $request)
    {

        $request->validate([
        'name' => 'required',
        'image' => 'required|mimes:jpg,bmp,png,jpeg',
    ]);

        if($request->hasfile('image')){
            $image=$request->file('image');
            $ext=$image->extension();
            $image_name=time().'.'.$ext;
            $image->storeAs('public/product_photo',$image_name);
        }

        Brand::create([
        'name' => $request->name,
        'image' =>  $image_name,
    ]);

        $request->session()->flash('message','Brand added');

        return redirect('admin/brand');
    }
 

    public function delete(Brand $brand_id)
    {
        Brand::destroy($brand_id->id);
        request()->session()->flash('message','Brand deleted');
        return back();
    }

    public function show(Brand $brand_id)
    {
      
        $brand=Brand::where(['id'=>$brand_id->id])->first();

    
        return view('admin.brand.show',compact('brand'));
    }

    public function update(Brand $brand)
    {
       
        $data=request()->validate([
            'name' => 'required',
            'image' => 'mimes:jpg,bmp,png,jpeg',
    ]);

        if(request()->hasfile('image')){
            $image=request()->file('image');
            $ext=$image->extension();
            $image_name=time().'.'.$ext;
            $image->storeAs('public/product_photo',$image_name);
            $data['image']=$image_name;
        
        }else{
            $data['image']=$brand->image;
        }

        $brand->update($data);

        request()->session()->flash('message','Brand edited');

        return redirect('admin/brand');
    }

    public function status(Brand $brand_id,$status)
    {
       
        

        $status=!$status;
        $brand_id->update(['status'=>$status]);

        request()->session()->flash('message','Brand status updated');

        return redirect('admin/brand');
    }
}
