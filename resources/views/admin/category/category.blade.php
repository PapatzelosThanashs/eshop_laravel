@extends('admin.layout')
@section('title', 'Category')
@section('active_category','active')
@section('content')

    <h1>Category</h1>
    <a href="category/create">
    <button type="button" class="btn btn-success" style="margin-bottom:10px;margin-top:10px;">Add Category</button>
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
                            <th>Category Name</th>
                            <th>Category Slug</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->category_name}}</td>
                            <td>{{$category->category_slug}}</td>
                            <td style="display: flex;">
                           
                            <form action="{{url('/admin/category/')}}/{{$category->id}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            
                            @if($category->status==false)
                            <a href="{{url('/admin/category/')}}/{{$category->id}}/{{$category->status}}"> <button type="submit" class="btn btn-success">Activate</button></a>
                            @else
                            <a href="{{url('/admin/category/')}}/{{$category->id}}/{{$category->status}}"> <button type="submit" class="btn btn-warning">Deactivate</button></a>
                            @endif

                            <a href="{{url('/admin/category/')}}/{{$category->id}}"> <button type="submit" class="btn btn-primary">Edit</button></a>
                         
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>    
        </div>   
    </div>             
@endsection