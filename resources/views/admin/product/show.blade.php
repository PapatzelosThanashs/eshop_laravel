@extends('admin.layout')
@section('title', 'Edit Product')
@section('content')

    <h1>Manage Product</h1>
    <a href="{{url('admin/product')}}">
    <button type="button" class="btn btn-success" style="margin-bottom:10px;margin-top:10px;">Back</button>
    </a>

    <div class="row m-t-30">
        <div class="col-md-12">
            <div class="table-responsive table--no-card m-b-30">
                <div class="card">
                    <div class="card-body">
                        <form action="{{url('/admin/product/')}}/{{$product->id}}" method="post" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <!--Name -->
                            <div class="form-group">
                                <label for="name" class="control-label mb-1">Product</label>
                                <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required value="{{$product->name ?? ''}}">
                                @error('name')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
								</div>
                                @enderror
                            </div>
                            <!--Slug -->
                            <div class="form-group">
                            <label for="slug" class="control-label mb-1">Slug</label>
                                <input id="slug" name="slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required value="{{$product->slug ?? ''}}">
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
                            <!--Category -->
                            <div class="form-group">
                            <label for="category_id">Choose a Category:</label>
                                <select id="category_id" name="category_id">
                                @foreach($categories as $category)
                                    @if($product->category_id==$category->id)
                                        <option selected value="{{$category->id}}">{{$category->category_name}}</option>
                                    @else
                                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endif
                                @endforeach
                                </select>
                            </div>
                            <!--Brand -->
                            <div class="form-group">
                            <label for="brand" class="control-label mb-1">Brand</label>
                                <input id="brand" name="brand" type="text" class="form-control" aria-required="true" aria-invalid="false" required value="{{$product->brand ?? ''}}">
                                @error('brand')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
								</div>
                                @enderror
                            </div>
                            <!--Model -->
                            <div class="form-group">
                            <label for="model" class="control-label mb-1">Model</label>
                                <input id="model" name="model" type="text" class="form-control" aria-required="true" aria-invalid="false" required value="{{$product->model ?? ''}}">
                                @error('model')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
								</div>
                                @enderror
                            </div>
                            <!--Short desc -->
                            <div class="form-group">
                            <label for="short_desc" class="control-label mb-1">Short desc</label>
                                <input id="short_desc" name="short_desc" type="text" class="form-control" aria-required="true" aria-invalid="false" required value="{{$product->short_desc ?? ''}}">
                                @error('short_desc')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
								</div>
                                @enderror
                            </div>
                            <!--Desc -->
                            <div class="form-group">
                            <label for="desc" class="control-label mb-1">Desc</label>
                                <input id="desc" name="desc" type="text" class="form-control" aria-required="true" aria-invalid="false" required value="{{$product->desc ?? ''}}">
                                @error('desc')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
								</div>
                                @enderror
                            </div>
                            <!--Keywords -->
                            <div class="form-group">
                            <label for="keywords" class="control-label mb-1">Keywords</label>
                                <input id="keywords" name="keywords" type="text" class="form-control" aria-required="true" aria-invalid="false" required value="{{$product->keywords ?? ''}}">
                                @error('keywords')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
								</div>
                                @enderror
                            </div>
                            <!--Technical Specification -->
                            <div class="form-group">
                            <label for="technical_specification" class="control-label mb-1">Technical Specification</label>
                                <input id="technical_specification" name="technical_specification" type="text" class="form-control" aria-required="true" aria-invalid="false" required value="{{$product->technical_specification ?? ''}}">
                                @error('technical_specification')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
								</div>
                                @enderror
                            </div>
                            <!--Uses -->
                            <div class="form-group">
                            <label for="uses" class="control-label mb-1">Uses</label>
                                <input id="uses" name="uses" type="text" class="form-control" aria-required="true" aria-invalid="false" required value="{{$product->uses ?? ''}}">
                                @error('uses')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
								</div>
                                @enderror
                            </div>
                            <!--Warranty -->
                            <div class="form-group">
                            <label for="warranty" class="control-label mb-1">Warranty</label>
                                <input id="warranty" name="warranty" type="text" class="form-control" aria-required="true" aria-invalid="false" required value="{{$product->warranty?? ''}}">
                                @error('warranty')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
								</div>
                                @enderror
                            </div>

                            
                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                    <span id="payment-button-amount">Submit</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>  
    </div>        
@endsection