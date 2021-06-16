<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use App\Models\ProductAttributes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    public function index()
    {
        $product= Product::all(); 
        return view('admin.product.product',compact('product'));
    }


    public function create()
    {
        
        $categories=Category::where(['status'=>1])->get();
        $colors= Color::where(['status'=>1])->get();
        $sizes= Size::where(['status'=>1])->get();
        $productattributes=[];
        return view('admin.product.create',compact('categories','productattributes','colors','sizes'));
    }

    public function store(Request $request)
    {
     
        $request->validate([
        'category_id' =>'required',
        'name' =>  'required|unique:products',
        'image'=>'required|mimes:jpg,bmp,png,jpeg',
        'slug' => 'required|unique:products,slug',
        'brand' =>'required',
        'model' => 'required',
        'short_desc' => 'required',
        'desc' => 'required',
        'keywords' => 'required',
        'technical_specification' => 'required',
        'uses' => 'required',
        'warranty' => 'required',
    ]);



        if($request->hasfile('image')){
            $image=$request->file('image');
            $ext=$image->extension();
            $image_name=time().'.'.$ext;
            $image->storeAs('public/product_photo',$image_name);
           
        }

                // edw functionality gia new product dd('ok');


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
       
        $categories=Category::where(['status'=>1])->get();
        $colors= Color::where(['status'=>1])->get();
        $sizes= Size::where(['status'=>1])->get();
        $productattributes=[];
        $productattributes=ProductAttributes::where(['products_id'=>$product_id->id])->get();
  
        return view('admin.product.show',compact('product','categories','colors','sizes','productattributes'));
    }

    public function update(Product $product)
    {
       
        $data=request()->validate([
            'category_id' =>'required',
            'name' => 'required',
            'image'=>'mimes:jpg,bmp,png,jpeg',
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

    

    /** if user input new file store new image else store the old */
    if(request()->hasfile('image')){
        $image=request()->file('image');
        $ext=$image->extension();
        $image_name=time().'.'.$ext;
        $image->storeAs('public/product_photo',$image_name);
        $data['image']=$image_name;
       
    }else{
        $data['image']=$product->image;
    }
        
   
        $this->update_attributes($product);
        

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

    public function removeAttr(ProductAttributes $productattribute_id){
        //dd( $productattribute_id->id);
        ProductAttributes::destroy($productattribute_id->id);
        request()->session()->flash('message','Attribute deleted');
       return redirect()->to(url()->previous()."#repeat");
       
    }

    public function update_attributes(Product $product){
                /**---------------start attributes section update------------------*/
    foreach(Request('sku') as $key=>$val){

        $data_attr=[
            'sku' => Request('sku')[$key],
            //'image_attr'=>Request('image_attr')[$key],
            'image_attr'=>'',
            'mrp' => Request('mrp')[$key],
            'price' =>Request('price')[$key],
            'qty' =>Request('qty')[$key],
            'sizes_id' =>Request('sizes_id')[$key],
            'colors_id' => Request('colors_id')[$key], 
        ];
           
         /* if user input new file image attribute store new image else store the old value.
            Key additionaly saved at file names to seperate files, beacause they are named based on time*/
           
            if(isset(request()->file('image_attr')[$key])){
                $image_attr=request()->file('image_attr')[$key];
                $ext=$image_attr->extension();
                $image_attr_name=time().$key.'.'.$ext;
                $image_attr->storeAs('public/product_photo',$image_attr_name);
                $data_attr['image_attr']=$image_attr_name;
                
            }else{
                $data_attr['image_attr']=$product->attribute()->get()[$key]->image_attr;
               
            }
           
      
        $validator = Validator::make($data_attr, [
            'sku' => 'required|max:8',
            'image_attr' =>'mimes:jpg,bmp,png,jpeg',
            'mrp' =>  'required',
            'price' => 'required',
            'qty' => 'required',
            'sizes_id' => 'required',
            'colors_id' => 'required',
        ]);
        
      
  
   
            
            
        /**save attribute errors into a session */
        request()->session()->flash('validator',$validator->errors()->first());

        if($validator->valid()){ 
            if($key >= ProductAttributes::where('products_id',$product->id)->count()){   
                    ProductAttributes::create([
                        'products_id'=>$product->id,
                        'sku' => Request('sku')[$key],
                        'image_attr'=>$data_attr['image_attr'],
                        'mrp' => Request('mrp')[$key],
                        'price' =>Request('price')[$key],
                        'qty' =>Request('qty')[$key],
                        'sizes_id' =>Request('sizes_id')[$key],
                        'colors_id' => Request('colors_id')[$key],
                    ]);
                
            }
            else{
                    ProductAttributes::where('products_id',$product->id)->get()[$key]->update($validator->valid());
            } 
        } 
    }
  

        /**---------------end attributes section ------------------*/
    }
}