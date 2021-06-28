@extends('admin.layout')
@section('title', 'Create Category')
@section('content')

    <h1>Manage Category</h1>
    <a href="{{url('admin/category')}}">
    <button type="button" class="btn btn-success" style="margin-bottom:10px;margin-top:10px;">Back</button>
    </a>

    <div class="row m-t-30">
        <div class="col-md-12">
            <div class="table-responsive table--no-card m-b-30">
                <div class="card">
                    <div class="card-body">
                        <form action="{{url('/admin/category')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="category_name" class="control-label mb-1">Category name</label>
                                <input id="category_name" name="category_name" type="text" class="form-control" aria-required="true" aria-invalid="false" required >
                                @error('category_name')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
								</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="category_slug" class="control-label mb-1">Category slug</label>
                                <input id="category_slug" name="category_slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required >
                                @error('category_slug')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
								</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="category_parent_id">Parent Category</label>
                                <select id="category_parent_id" name="category_parent_id"  class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="category_image" class="control-label mb-1">Category Image</label>
                                <input  id="category_image" name="category_image" type="file" class="form-control" aria-required="true" aria-invalid="false" required >
                                @error('category_image')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            
                            <input type="checkbox" name="is_home" id="is_home" value="1">Show in Home Page
                            
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