@extends('admin.layout')
@section('title', 'Create Product')
@section('content')

    <h1>Manage Product</h1>
    <a href="{{url('admin/product')}}">
    <button type="button" class="btn btn-success" style="margin-bottom:10px;margin-top:10px;">Back</button>
    </a>
    @if(session('message'))
            <div class="alert alert-danger" role="alert">
        {{session('message')}}  
            </div>
    @endif
    <form action="{{url('/admin/product')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row m-t-30">
            <div class="col-md-12">
                <div class="table--no-card m-b-30">
                    <div class="card">
                        <div class="card-body">
                            
                                <!--Name -->
                                <div class="form-group">
                                    <label for="name" class="control-label mb-1">Product</label>
                                    <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required >
                                    @error('name')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <!--Slug -->
                                <div class="form-group">
                                <label for="slug" class="control-label mb-1">Slug</label>
                                    <input id="slug" name="slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required >
                                    @error('slug')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <!--Image -->
                                <div class="form-group">
                                <label for="image" class="control-label mb-1">Image</label>
                                    <input  id="image" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false" required >
                                    @error('image')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="row m-t-30" >
                                        
                                            <!--Category -->
                                        <div class="col-md-4">   
                                            <label for="category_id">Category</label><BR>
                                                <select id="category_id" name="category_id" class="form-control">
                                                <option value="" disabled selected>Select Category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                                @endforeach
                                                </select>
                                        </div>          
                                            <!--Brand -->
                                        <div class="col-md-4">           
                                            <label for="brand_id" class="control-label mb-1">Brand</label>
                                                <select id="brand_id" name="brand_id" class="form-control">
                                                <option value="" disabled selected>Select Brand</option>
                                                @foreach($brands as $brand)
                                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                @endforeach
                                                </select>
                                        </div>            
                                            <!--Model -->
                                        <div class="col-md-4">      
                                            <label for="model" class="control-label mb-1">Model</label>
                                                <input id="model" name="model" type="text" class="form-control" aria-required="true" aria-invalid="false" required >
                                                @error('model')
                                                <div class="alert alert-danger" role="alert">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                        </div>                   
                                    </div>                  
                                </div>           
                    
                                <!--Short desc -->
                                <div class="form-group">
                                <label for="short_desc" class="control-label mb-1">Short desc</label>
                                    <input id="short_desc" name="short_desc" type="text" class="form-control" aria-required="true" aria-invalid="false" required >
                                    @error('short_desc')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <!--Desc -->
                                <div class="form-group">
                                <label for="desc" class="control-label mb-1">Desc</label>
                                    <input id="desc" name="desc" type="text" class="form-control" aria-required="true" aria-invalid="false" required >
                                    @error('desc')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <!--Keywords -->
                                <div class="form-group">
                                <label for="keywords" class="control-label mb-1">Keywords</label>
                                    <input id="keywords" name="keywords" type="text" class="form-control" aria-required="true" aria-invalid="false" required >
                                    @error('keywords')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <!--Technical Specification -->
                                <div class="form-group">
                                <label for="technical_specification" class="control-label mb-1">Technical Specification</label>
                                    <input id="technical_specification" name="technical_specification" type="text" class="form-control" aria-required="true" aria-invalid="false" required >
                                    @error('technical_specification')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <!--Uses -->
                                <div class="form-group">
                                <label for="uses" class="control-label mb-1">Uses</label>
                                    <input id="uses" name="uses" type="text" class="form-control" aria-required="true" aria-invalid="false" required >
                                    @error('uses')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <!--Warranty -->
                                <div class="form-group">
                                <label for="warranty" class="control-label mb-1">Warranty</label>
                                    <input id="warranty" name="warranty" type="text" class="form-control" aria-required="true" aria-invalid="false" required >
                                    @error('warranty')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="row m-t-30" >
                                        <!--Lead time-->
                                        <div class="col-md-8">      
                                            <label for="lead_time" class="control-label mb-1">Lead Time</label>
                                            <input id="lead_time" name="lead_time" type="text" class="form-control" aria-required="true" aria-invalid="false" required >
                                            @error('lead_time')
                                            <div class="alert alert-danger" role="alert">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>            
                                              
                                            <!--Tax-->
                                        <div class="col-md-4">           
                                            <label for="tax_id" class="control-label mb-1">Tax</label>
                                            <select id="tax_id" name="tax_id" class="form-control">
                                            <option value="" disabled selected>Select Tax</option>
                                            @foreach($taxes as $tax)
                                                <option value="{{$tax->id}}">{{$tax->tax_desc}}</option>
                                            @endforeach
                                            </select>
                                        </div>            
                                              
                                    </div>                  
                                </div>   

                                <div class="form-group">
                                    <div class="row m-t-30" >
                                               
                                            <!--is promo-->
                                        <div class="col-md-3">           
                                            <label for="is_promo" class="control-label mb-1">Is Promo</label>
                                            <select id="is_promo" name="is_promo" class="form-control">
                                            <option value="" disabled selected>Select</option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>                                          
                                            </select>
                                        </div>         
                                              
                                            <!--is featured-->
                                            <div class="col-md-3">           
                                            <label for="is_featured" class="control-label mb-1">Is Featured</label>
                                            <select id="is_featured" name="is_featured" class="form-control">
                                            <option value="" disabled selected>Select</option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>                                          
                                            </select>
                                        </div>                    

                                             <!--is discounted-->
                                        <div class="col-md-3">           
                                            <label for="is_discounted" class="control-label mb-1">Is Discounted</label>
                                            <select id="is_discounted" name="is_discounted" class="form-control">
                                            <option value="" disabled selected>Select</option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>                                          
                                            </select>
                                        </div>   

                                             <!--is trending-->
                                        <div class="col-md-3">           
                                            <label for="is_trending" class="control-label mb-1">Is Trending</label>
                                            <select id="is_trending" name="is_trending" class="form-control">
                                            <option value="" disabled selected>Select</option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>                                          
                                            </select>
                                        </div>       
                                              
                                    </div>                  
                                </div>   

                        </div>
                    </div>
                </div>
            </div>  
        </div>  
        @include('admin.product.images')            
        @include('admin.product.attributes')
        <div>
            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                <i class="fa fa-check" aria-hidden="true"></i>
                <span id="payment-button-amount">Submit</span>
            </button>
        </div>
    </form>
                 
@endsection