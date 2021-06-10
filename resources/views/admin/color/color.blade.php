@extends('admin.layout')
@section('title', 'Color')
@section('active_color','active')
@section('content')

    <h1>Color</h1>
    <a href="color/create">
    <button type="button" class="btn btn-success" style="margin-bottom:10px;margin-top:10px;">Add Color</button>
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
                            <th>Color</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($color as $color_val)
                        <tr>
                            <td>{{$color_val->id}}</td>
                            <td>{{$color_val->color}}</td>
                            <td style="display: flex;">
                           
                            <form action="{{url('/admin/color/')}}/{{$color_val->id}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>

                            @if($color_val->status==false)
                            <a href="{{url('/admin/color/')}}/{{$color_val->id}}/{{$color_val->status}}"> <button type="submit" class="btn btn-success">Activate</button></a>
                            @else
                            <a href="{{url('/admin/color/')}}/{{$color_val->id}}/{{$color_val->status}}"> <button type="submit" class="btn btn-warning">Deactivate</button></a>
                            @endif
                            
                             <a href="{{url('/admin/color/')}}/{{$color_val->id}}"> <button type="submit" class="btn btn-primary">Edit</button></a>
                         
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>    
        </div>   
    </div>             
@endsection