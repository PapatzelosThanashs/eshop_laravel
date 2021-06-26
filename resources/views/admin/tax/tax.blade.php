@extends('admin.layout')
@section('title', 'Tax')
@section('active_tax','active')
@section('content')

    <h1>Tax</h1>
    <a href="tax/create">
    <button type="button" class="btn btn-success" style="margin-bottom:10px;margin-top:10px;">Add Tax</button>
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
                            <th>Tax description</th>
                            <th>Tax value</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tax as $tax_val)
                        <tr>
                            <td>{{$tax_val->id}}</td>
                            <td>{{$tax_val->tax_desc}}</td>
                            <td>{{$tax_val->tax_value}}</td>
                            <td style="display: flex;">
                           
                            <form action="{{url('/admin/tax/')}}/{{$tax_val->id}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>

                            @if($tax_val->status==false)
                            <a href="{{url('/admin/tax/')}}/{{$tax_val->id}}/{{$tax_val->status}}"> <button type="submit" class="btn btn-success">Activate</button></a>
                            @else
                            <a href="{{url('/admin/tax/')}}/{{$tax_val->id}}/{{$tax_val->status}}"> <button type="submit" class="btn btn-warning">Deactivate</button></a>
                            @endif
                            
                             <a href="{{url('/admin/tax/')}}/{{$tax_val->id}}"> <button type="submit" class="btn btn-primary">Edit</button></a>
                         
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>    
        </div>   
    </div>             
@endsection