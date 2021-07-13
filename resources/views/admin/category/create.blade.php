@extends('admin.layout')
@section('title', 'Create Category')
@section('content')

    <h1>Create Category</h1>
    <a href="{{ url('admin/category') }}">
        <button type="button" class="btn btn-success margin-top-bottom">Back</button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">
            <div class="table-responsive table--no-card m-b-30">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ url('/admin/category') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="categoryName" class="control-label mb-1">Category name</label>
                                <input id="category_name" name="categoryName" type="text" class="form-control"
                                       aria-required="true" aria-invalid="false" required>
                                @error('categoryName')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="categorySlug" class="control-label mb-1">Category slug</label>
                                <input id="category_slug" name="categorySlug" type="text" class="form-control"
                                       aria-required="true" aria-invalid="false" required>
                                @error('categorySlug')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="categoryParentId">Parent Category</label>
                                <select id="category_parent_id" name="categoryParentId" class="form-control">
                                    <option value="0">No parent</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="categoryImage" class="control-label mb-1">Category Image</label>
                                <input id="category_image" name="categoryImage" type="file" class="form-control"
                                       aria-required="true" aria-invalid="false" required>
                                @error('categoryImage')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="is_home" name="isHome" value="1">
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
