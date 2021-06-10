@extends('admin.layout')
@section('title', 'Size')
@section('active_size','active')
@section('content')

    <h1>Size</h1>
    <a href="size/create">
    <button type="button" class="btn btn-success" style="margin-bottom:10px;margin-top:10px;">Add Size</button>
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
                            <th>Size</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($size as $size_val)
                        <tr>
                            <td>{{$size_val->id}}</td>
                            <td>{{$size_val->size}}</td>
                            <td style="display: flex;">
                           
                            <form action="{{url('/admin/size/')}}/{{$size_val->id}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>

                            @if($size_val->status==false)
                            <a href="{{url('/admin/size/')}}/{{$size_val->id}}/{{$size_val->status}}"> <button type="submit" class="btn btn-success">Activate</button></a>
                            @else
                            <a href="{{url('/admin/size/')}}/{{$size_val->id}}/{{$size_val->status}}"> <button type="submit" class="btn btn-warning">Deactivate</button></a>
                            @endif
                            
                             <a href="{{url('/admin/size/')}}/{{$size_val->id}}"> <button type="submit" class="btn btn-primary">Edit</button></a>
                         
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>    
        </div>   
    </div>             
@endsection