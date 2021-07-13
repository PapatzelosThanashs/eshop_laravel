@extends('admin.layout')
@section('title', 'Category')
@section('active_category','active')
@section('content')
    <h1>Category</h1>
    <a href="{{ url('/admin/category/create') }}">
        <button type="button" class="btn btn-success margin-top-bottom">Add Category</button>
    </a>

    <div class="row m-t-30">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <div class="table-responsive table--no-card m-b-30">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Category Slug</th>
                        <th>Category Parent</th>
                        <th>Category Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $category->category_slug }}</td>
                            <td>{{ $category->parentName($category->category_parent_id) }}</td>
                            <td><img src="{{ asset('storage/product_photo/product_categories/' . $category->category_image) }}"
                                     alt="category image">
                            </td>
                            <td class="flex-row-box">
                                <a href="{{ url('/admin/category/' . $category->id) }}">
                                    <button type="submit" class="btn btn-primary margin-left-right">Edit</button>
                                </a>
                                <a href="{{ url('/admin/category/' . $category->id .'/'. $category->status) }}">
                                    <button type="submit" class="btn {{ $category->status ? 'btn-warning' : 'btn-success' }} margin-left-right">
                                        {{ $category->status ? 'Deactivate' : 'Activate' }}</button>
                                </a>
                                <form action="{{ url('/admin/category/' . $category->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger margin-left-right">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="pagination-arrows">
        {{ $categories->links() }}
    </div>
@endsection



