@extends('admin.layout')
@section('title', 'Edit Brand')
@section('content')

    <h1>Manage Brand</h1>
    <a href="{{url('admin/brand')}}">
    <button type="button" class="btn btn-success" style="margin-bottom:10px;margin-top:10px;">Back</button>
    </a>

    <div class="row m-t-30">
        <div class="col-md-12">
            <div class="table-responsive table--no-card m-b-30">
                <div class="card">
                    <div class="card-body">
                        <form action="{{url('/admin/brand/')}}/{{$brand->id}}" method="post" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <label for="name" class="control-label mb-1">Brand title</label>
                                <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required value="{{$brand->name ?? ''}}">
                                @error('brand_name')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
								</div>
                                @enderror
                            </div>

                            <div class="form-group">
                            <label for="image" class="control-label mb-1">Change Image</label>
                                <img style="width:50px;height:50px" src="{{ asset('storage/product_photo/'.$brand->image) }}" alt="Italian Trulli">
                                <input  id="image" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false"   >
                                @error('image')
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