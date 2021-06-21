@extends('admin.layout')
@section('title', 'Brand')
@section('active_brand','active')
@section('content')

    <h1>Brand</h1>
    <a href="brand/create">
    <button type="button" class="btn btn-success" style="margin-bottom:10px;margin-top:10px;">Add brand</button>
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
                            <th>Brand Name</th>
                            <th>Brand Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($brands as $brand)
                        <tr>
                            <td>{{$brand->id}}</td>
                            <td>{{$brand->name}}</td>
                            <td><img style="width:50px;height:50px" src="{{ asset('storage/brands/'.$brand->image) }}" alt="Italian Trulli"></td>
                            <td style="display: flex;">
                           
                            <form action="{{url('/admin/brand/')}}/{{$brand->id}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>

                            @if($brand->status==false)
                            <a href="{{url('/admin/brand/')}}/{{$brand->id}}/{{$brand->status}}"> <button type="submit" class="btn btn-success">Activate</button></a>
                            @else
                            <a href="{{url('/admin/brand/')}}/{{$brand->id}}/{{$brand->status}}"> <button type="submit" class="btn btn-warning">Deactivate</button></a>
                            @endif
                            
                             <a href="{{url('/admin/brand/')}}/{{$brand->id}}"> <button type="submit" class="btn btn-primary">Edit</button></a>
                         
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>    
        </div>   
    </div>             
@endsection