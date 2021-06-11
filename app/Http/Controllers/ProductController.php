<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function index()
    {
        $product= Product::all();
        return view('admin.product.product',compact('product'));
    }


    public function create()
    {
        $categories = DB::table('categories')->get();
        return view('admin.product.create',compact('categories'));
    }

    public function store(Request $request)
    {
     
        $request->validate([
        'name' => 'required|unique:products',
    ]);



        if($request->hasfile('image')){
            $image=$request->file('image');
            $ext=$image->extension();
            $image_name=time().'.'.$ext;
            $image->storeAs('public/product_photo',$image_name);
           
        }




        Product::create([
        'category_id' =>$request->category_id,
        'name' => $request->name,
        'image' => $image_name,
        'slug' => $request->slug,
        'brand' => $request->brand,
        'model' => $request->model,
        'short_desc' => $request->short_desc,
        'desc' => $request->desc,
        'keywords' => $request->keywords,
        'technical_specification' => $request->technical_specification,
        'uses' => $request->uses,
        'warranty' => $request->warranty,
    ]);

        $request->session()->flash('message','Product added');

        return redirect('admin/product');
    }
 

    public function delete(Product $product_id)
    {
        Product::destroy($product_id->id);
        request()->session()->flash('message','Product deleted');
        return back();
    }

    public function show(Product $product_id)
    {
      
        $product=Product::where(['id'=>$product_id->id])->first();
       
        $categories = DB::table('categories')->where(['type'=>1])->get();
        return view('admin.product.show',compact('product','categories'));
    }

    public function update(Product $product)
    {
       
        $data=request()->validate([
            'category_id' =>'required',
            'name' => 'required',
            'image' => 'required',
            'slug' => 'required',
            'brand' =>'required',
            'model' => 'required',
            'short_desc' => 'required',
            'desc' => 'required',
            'keywords' => 'required',
            'technical_specification' => 'required',
            'uses' => 'required',
            'warranty' => 'required',
    ]);


    if(request()->hasfile('image')){
        $image=request()->file('image');
        $ext=$image->extension();
        $image_name=time().'.'.$ext;
        $image->storeAs('public/product_photo',$image_name);
       
    }
        
        $data['image']=$image_name;

        $product->update($data);

        request()->session()->flash('message','Product edited');

        return redirect('admin/product');
    }

    public function status(Product $product_id,$status)
    {
       
        

        $status=!$status;
        $product_id->update(['status'=>$status]);

        request()->session()->flash('message','Product status updated');

        return redirect('admin/product');
    }
}
