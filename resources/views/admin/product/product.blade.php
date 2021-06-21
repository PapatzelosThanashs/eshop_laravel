@extends('admin.layout')
@section('title', 'Product')
@section('active_product','active')
@section('content')

    <h1>Product</h1>
    <a href="product/create">
    <button type="button" class="btn btn-success" style="margin-bottom:10px;margin-top:10px;">Add Product</button>
    </a>

    <div class="row m-t-30">

        <div class="col-md-12">
        @if(session('message'))
            <div class="alert alert-success" role="alert">
        {{session('message')}}  
            </div>
        @endif
           <div class="table-responsive table--no-card m-b-30">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product as $product_val)
                        <tr>
                            <td>{{$product_val->id}}</td>
                            <td><img style="width:50px;height:50px" src="{{ asset('storage/product_photo/product_images/'.$product_val->image) }}" alt="Italian Trulli"></td>
                            <td>{{$product_val->name}}</td>
                            <td>{{$product_val->slug}}</td>
                            <td style="display: flex;">
                           
                            <form action="{{url('/admin/product/')}}/{{$product_val->id}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>

                            @if($product_val->status==false)
                            <a href="{{url('/admin/product/')}}/{{$product_val->id}}/{{$product_val->status}}"> <button type="submit" class="btn btn-success">Activate</button></a>
                            @else
                            <a href="{{url('/admin/product/')}}/{{$product_val->id}}/{{$product_val->status}}"> <button type="submit" class="btn btn-warning">Deactivate</button></a>
                            @endif
                            
                             <a href="{{url('/admin/product/')}}/{{$product_val->id}}"> <button type="submit" class="btn btn-primary">Edit</button></a>
                         
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>    
        </div>   
    </div>             
@endsection