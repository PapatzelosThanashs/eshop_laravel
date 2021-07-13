@extends('admin.layout')
@section('title', 'Edit Category')
@section('content')

    <h1>Manage Category</h1>
    <a href="{{ url('admin/category') }}">
        <button type="button" class="btn btn-success margin-top-bottom">Back</button>
    </a>

    <div class="row m-t-30">
        <div class="col-md-12">
            <div class="table-responsive table--no-card m-b-30">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ url('/admin/category/' . $category->id) }}" method="post"
                              enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="category_name" class="control-label mb-1">Category name</label>
                                <input id="category_name" name="categoryName" type="text" class="form-control"
                                       aria-required="true" aria-invalid="false" required
                                       value="{{ $category->category_name ?? '' }}">
                                @error('categoryName')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="category_slug" class="control-label mb-1">Category slug</label>
                                <input id="category_slug" name="categorySlug" type="text" class="form-control"
                                       aria-required="true" aria-invalid="false" required
                                       value="{{ $category->category_slug ?? '' }}">
                                @error('categorySlug')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="category_parent_id">Parent Category</label>
                                <select id="category_parent_id" name="categoryParentId" class="form-control">
                                    <option value="0">No Parent</option>
                                    @foreach($categories as $categoryValue)
                                        @if($categoryValue->id === $category->category_parent_id)
                                            <option selected value="{{ $categoryValue->id }}">{{ $categoryValue->category_name }}</option>
                                        @else
                                            <option value="{{ $categoryValue->id }}">{{ $categoryValue->category_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="category_image" class="control-label mb-1">Category Image</label>
                                <img
                                     src="{{ asset('storage/product_photo/product_categories/' . $category->category_image) }}"
                                     alt="category image">
                                <input id="category_image" name="categoryImage" type="file" class="form-control"
                                       aria-required="true" aria-invalid="false">
                                @error('categoryImage')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="is_home" name="isHome" {{ $category->is_home ? 'checked' : '' }} value="1">
                                <label class="form-check-label" for="is_home">Show in Home Page</label>
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
